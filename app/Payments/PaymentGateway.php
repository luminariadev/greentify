<?php

namespace App\Payments;

use App\Models\Payment;
use App\Payments\Support\ChargeRequest;
use App\Payments\Support\ChargeResult;

/**
 * A payment provider integration.
 *
 * The application never talks to a provider SDK directly — everything
 * goes through this contract, so swapping manual instructions for a real
 * gateway (Midtrans, Xendit, QRIS) is a container binding and not a
 * rewrite of the controllers.
 */
interface PaymentGateway
{
    /**
     * The name recorded on Payment::gateway, e.g. "manual" or "midtrans".
     */
    public function name(): string;

    /**
     * Create a charge and return everything the payer needs to complete
     * it. Implementations must not mark the payment paid — settlement
     * happens on the webhook, never here.
     */
    public function charge(ChargeRequest $request): ChargeResult;

    /**
     * Re-read the provider's current state for a payment. Returns null
     * when the provider has no record, which the caller treats as
     * "still pending" rather than as a failure.
     */
    public function status(Payment $payment): ?ChargeResult;
}
