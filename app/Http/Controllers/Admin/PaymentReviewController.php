<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Notifications\PaymentReviewed;
use App\Payments\PaymentManager;
use App\Payments\Support\RevenueTrend;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
     *
     * Optionally narrowed to a submitted-at date range. An unparseable
     * bound is dropped rather than rejected: this is a read-only view of
     * the operator's own queue, so a typo in the date box should widen
     * the result set, not hand the operator an error page mid-reconcile.
     */
    public function index(Request $request): View
    {
        $from = $this->parseDate($request->query('from'));
        $to = $this->parseDate($request->query('to'));

        $awaiting = $this->filteredAwaiting($from, $to)
            ->with(['user', 'payable'])
            ->paginate(20)
            ->withQueryString();

        $recentlyReviewed = Payment::query()
            ->whereNotNull('reviewed_at')
            ->with(['user', 'reviewer'])
            ->latest('reviewed_at')
            ->limit(10)
            ->get();

        $stats = [
            // The header number has to describe the table under it. If it
            // counted every claim while the list showed one page of a
            // filtered range, the operator would be reading a figure that
            // does not match what they are looking at.
            'awaiting' => $this->filteredAwaiting($from, $to)->count(),
            'expired' => Payment::query()
                ->where('status', Payment::STATUS_EXPIRED)
                ->count(),
            'settled_today' => Payment::query()
                ->where('status', Payment::STATUS_PAID)
                ->whereDate('paid_at', now()->toDateString())
                ->count(),
            'settled_total' => Payment::query()->where('status', Payment::STATUS_PAID)->count(),
        ];

        // The trend reads from settled payments, so the queue's submitted-at
        // window is the wrong one to hand it: a claim sitting in the queue
        // has no revenue yet, and the paid_at window is a different set of
        // rows than the list under it. Sharing the range would tie a chart
        // of income to a filter about claims — two different questions that
        // happen to use the same two date inputs.
        $granularity = RevenueTrend::normaliseGranularity($request->query('granularity'));
        $revenueBuckets = RevenueTrend::build($granularity);
        $revenue = RevenueTrend::summary($revenueBuckets);

        return view('admin.payments.index', compact(
            'awaiting',
            'recentlyReviewed',
            'stats',
            'from',
            'to',
            'granularity',
            'revenueBuckets',
            'revenue',
        ));
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
     * The claim queue, narrowed to a submitted-at range when given.
     *
     * Built as a fresh query rather than reusing a scope so the exact same
     * predicate feeds the list and the header count — that equality is
     * what the tests pin down.
     *
     * @return \Illuminate\Database\Eloquent\Builder<Payment>
     */
    private function filteredAwaiting(?Carbon $from, ?Carbon $to): Builder
    {
        return Payment::query()
            ->awaitingReview()
            ->when(
                $from !== null,
                fn (Builder $query) => $query->where('submitted_at', '>=', $from->startOfDay()),
            )
            ->when(
                $to !== null,
                fn (Builder $query) => $query->where('submitted_at', '<=', $to->endOfDay()),
            );
    }

    /**
     * A date box the operator can mistype should widen the result set, not
     * blow up their queue with a validation error. Anything unparseable
     * becomes null, which the caller reads as "no bound".
     */
    private function parseDate(mixed $value): ?Carbon
    {
        if (! is_string($value) || trim($value) === '') {
            return null;
        }

        try {
            return Carbon::createFromFormat('Y-m-d', trim($value))?->startOfDay();
        } catch (\Throwable) {
            return null;
        }
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
