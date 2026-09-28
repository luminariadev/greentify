<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Payments\Concerns\GatewayEvent;
use App\Payments\PaymentManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function __construct(private readonly PaymentManager $payments) {}

    /**
     * Show what the payer still has to do for a pending payment.
     */
    public function show(Request $request, string $reference): View|RedirectResponse
    {
        $payment = Payment::where('reference', $reference)->firstOrFail();

        $this->authorizePaymentOwner($request, $payment);

        return view('payments.show', compact('payment'));
    }

    /**
     * Guest receipt, reached through a temporary signed URL.
     *
     * A guest donation has no user_id, so it cannot go through
     * authorizePaymentOwner() — and the bare reference must never be
     * enough on its own. The signature expires, so the link is useless
     * once the payment is stale.
     */
    public function guestShow(Request $request, string $reference): View
    {
        abort_unless($request->hasValidSignature(), 403);

        $payment = Payment::where('reference', $reference)->firstOrFail();

        return view('payments.show', compact('payment'));
    }

    /**
     * The payer says the money is on its way.
     *
     * This is a claim, not a settlement. Before 29 Sep 2026 the endpoint
     * pushed a paid event straight through PaymentManager::apply(), which
     * meant anyone could mark their own donation completed by pressing one
     * button — the manual gateway's "verification manual" was a sentence
     * in the UI and nothing in the code. It now only moves the payment
     * into the operator queue; an admin has to look at the bank statement.
     *
     * It deliberately does not accept an amount — the amount is whatever
     * the payment was created with.
     */
    public function confirm(Request $request, string $reference): RedirectResponse
    {
        $payment = Payment::where('reference', $reference)->firstOrFail();

        $this->authorizePaymentOwner($request, $payment);

        if ($payment->status !== Payment::STATUS_PENDING) {
            return redirect()->route('payments.show', $reference)
                ->with('error', $payment->isInReview()
                    ? 'Pembayaran ini sudah menunggu verifikasi operator.'
                    : 'Pembayaran ini sudah tidak berstatus menunggu.');
        }

        $submitted = $this->payments->submitForReview($payment, 'user:'.(string) $request->user()->id);

        return redirect()->route('payments.show', $reference)->with(
            $submitted ? 'success' : 'error',
            $submitted
                ? 'Terima kasih! Tim Greentify akan memverifikasi transfer Anda dalam 1x24 jam.'
                : 'Pembayaran ini sudah pernah dikirim untuk verifikasi.',
        );
    }

    /**
     * Provider callback.
     *
     * Rejects a payload whose amount does not match the payment, because
     * a provider webhook is an unauthenticated POST and the reference is
     * the only thing tying it to our row.
     */
    public function webhook(Request $request): JsonResponse
    {
        $reference = (string) $request->input('reference');
        $status = (string) $request->input('status');

        $payment = Payment::where('reference', $reference)->first();

        if ($payment === null) {
            return response()->json(['message' => 'Unknown reference'], 404);
        }

        if ($request->filled('amount') && (float) $request->input('amount') !== (float) $payment->amount) {
            return response()->json(['message' => 'Amount mismatch'], 422);
        }

        $mapped = match ($status) {
            'paid', 'success', 'settlement' => Payment::STATUS_PAID,
            'failed', 'deny', 'cancel', 'expire' => Payment::STATUS_FAILED,
            default => null,
        };

        if ($mapped === null) {
            return response()->json(['message' => 'Ignored status'], 200);
        }

        $this->payments->apply(new GatewayEvent(
            payment: $payment,
            status: $mapped,
            gatewayReference: $request->input('gateway_reference'),
            message: $request->input('message'),
            payload: $request->all(),
        ));

        // Always 200: a non-2xx makes the provider retry forever, and
        // apply() is idempotent, so a retry is harmless anyway.
        return response()->json(['message' => 'OK']);
    }

    /**
     * Only the payer (or an admin) may see or confirm a payment.
     */
    private function authorizePaymentOwner(Request $request, Payment $payment): void
    {
        $user = $request->user();

        if ($user === null) {
            abort(403, 'Silakan login untuk melihat pembayaran ini.');
        }

        if ($payment->user_id === null || $payment->user_id !== $user->id) {
            abort(403, 'Pembayaran ini bukan milik Anda.');
        }
    }
}
