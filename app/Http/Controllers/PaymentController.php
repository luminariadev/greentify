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
     * The payer says the money is on its way.
     *
     * For a manual gateway this is the only path to settlement, which is
     * why it is rate limited and why the operator still has to verify the
     * bank statement. It deliberately does not accept an amount — the
     * amount is whatever the payment was created with.
     */
    public function confirm(Request $request, string $reference): RedirectResponse
    {
        $payment = Payment::where('reference', $reference)->firstOrFail();

        $this->authorizePaymentOwner($request, $payment);

        if ($payment->effectiveStatus() !== Payment::STATUS_PENDING) {
            return redirect()->route('payments.show', $reference)
                ->with('error', 'Pembayaran ini sudah tidak berstatus menunggu.');
        }

        $event = new GatewayEvent(
            payment: $payment,
            status: Payment::STATUS_PAID,
            message: 'Dikonfirmasi manual oleh payer.',
            payload: ['confirmed_by' => (string) ($request->user()?->id ?? 'guest')],
        );

        $applied = $this->payments->apply($event);

        return redirect()->route('payments.show', $reference)->with(
            $applied ? 'success' : 'error',
            $applied
                ? 'Terima kasih! Pembayaran dikonfirmasi dan sedang diproses.'
                : 'Pembayaran ini sudah pernah dikonfirmasi.',
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
