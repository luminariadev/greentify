<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Notifications\PaymentReviewed;
use App\Payments\PaymentManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

/**
 * The operator queue for manual-gateway payments.
 *
 * This is the counterpart to the self-settling bug fixed in
 * PaymentController::confirm() — somebody has to look at the bank
 * statement before a donation is counted or a membership activates.
 */
class PaymentReviewController extends Controller
{
    public function __construct(private readonly PaymentManager $payments) {}

    /**
     * Claimed payments, oldest first, with the last decision for context.
     */
    public function index(): View
    {
        $awaiting = Payment::query()
            ->awaitingReview()
            ->with(['user', 'payable'])
            ->paginate(20);

        $recentlyReviewed = Payment::query()
            ->whereNotNull('reviewed_at')
            ->with(['user', 'reviewer'])
            ->latest('reviewed_at')
            ->limit(10)
            ->get();

        $stats = [
            'awaiting' => Payment::query()->awaitingReview()->count(),
            'settled_today' => Payment::query()
                ->where('status', Payment::STATUS_PAID)
                ->whereDate('paid_at', now()->toDateString())
                ->count(),
            'settled_total' => Payment::query()->where('status', Payment::STATUS_PAID)->count(),
        ];

        return view('admin.payments.index', compact('awaiting', 'recentlyReviewed', 'stats'));
    }

    /**
     * The money is on the statement — settle it.
     */
    public function approve(Request $request, string $reference): RedirectResponse
    {
        $payment = $this->findInReview($reference);

        $applied = $this->payments->review($payment, (int) $request->user()->id, true, 'Diverifikasi pada rekening.');

        if (! $applied) {
            return redirect()->route('admin.payments.index')
                ->with('error', 'Pembayaran ini sudah diputuskan oleh operator lain.');
        }

        $this->notifyPayer($payment->refresh(), true, 'Diverifikasi pada rekening.');

        return redirect()->route('admin.payments.index')
            ->with('success', "Pembayaran {$payment->reference} disetujui dan donasi/membership diproses.");
    }

    /**
     * The money never arrived. Rejection is not a silent delete — the
     * reason goes to the payer, who can then pay again.
     */
    public function reject(Request $request, string $reference): RedirectResponse
    {
        $validated = $request->validate([
            'note' => ['required', 'string', 'min:10', 'max:255'],
        ], [
            'note.required' => 'Alasan penolakan wajib diisi agar payer tahu apa yang harus diperbaiki.',
            'note.min' => 'Alasan penolakan minimal 10 karakter.',
        ]);

        $payment = $this->findInReview($reference);

        $applied = $this->payments->review($payment, (int) $request->user()->id, false, $validated['note']);

        if (! $applied) {
            return redirect()->route('admin.payments.index')
                ->with('error', 'Pembayaran ini sudah diputuskan oleh operator lain.');
        }

        $this->notifyPayer($payment->refresh(), false, $validated['note']);

        return redirect()->route('admin.payments.index')
            ->with('success', "Pembayaran {$payment->reference} ditolak. Payer sudah diberi tahu alasannya.");
    }

    /**
     * Only payments actually sitting in the queue may be decided, so a
     * replayed approve on an already-settled payment is a no-op rather
     * than a second settlement.
     */
    private function findInReview(string $reference): Payment
    {
        $payment = Payment::where('reference', $reference)->firstOrFail();

        abort_unless($payment->isInReview(), 409, 'Pembayaran ini tidak sedang menunggu verifikasi.');

        return $payment;
    }

    private function notifyPayer(Payment $payment, bool $approved, string $note): void
    {
        if ($payment->user === null) {
            // Guest donation: the payer has no account to notify, and the
            // signed receipt link is the only channel they have.
            return;
        }

        Notification::send($payment->user, new PaymentReviewed(
            reference: $payment->reference,
            approved: $approved,
            note: $note,
        ));
    }
}
