<?php

namespace App\Payments;

use App\Models\Donation;
use App\Models\Membership;
use App\Models\Payment;
use App\Payments\Concerns\GatewayEvent;
use App\Payments\Support\ChargeRequest;
use App\Payments\Support\ChargeResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaymentManager
{
    public function __construct(private readonly PaymentGateway $gateway) {}

    public function gatewayName(): string
    {
        return $this->gateway->name();
    }

    /**
     * Charge a donation and record the payment that will settle it.
     */
    public function chargeDonation(Donation $donation, string $method, ?string $email = null, ?string $name = null): Payment
    {
        return $this->charge(
            payable: $donation,
            method: $method,
            amount: (float) $donation->amount,
            currency: $donation->currency ?? 'IDR',
            description: 'Donasi Greentify Rp '.number_format((float) $donation->amount, 0, ',', '.'),
            email: $email,
            name: $name,
        );
    }

    /**
     * Charge a membership subscription.
     *
     * The membership row stays inactive until the payment settles: a
     * checkout that is never paid must not grant premium access.
     */
    public function chargeMembership(Membership $membership, string $method, ?string $email = null, ?string $name = null): Payment
    {
        $tier = $membership->tier;

        return $this->charge(
            payable: $membership,
            method: $method,
            amount: (float) $tier->price,
            currency: 'IDR',
            description: 'Membership '.$tier->name.' — Greentify',
            email: $email,
            name: $name,
        );
    }

    /**
     * Apply a gateway event to a payment, at most once.
     *
     * Returns true when this call is the one that moved the status,
     * false when the payment was already settled — which is what a
     * duplicate webhook looks like.
     */
    public function apply(GatewayEvent $event): bool
    {
        return DB::transaction(function () use ($event): bool {
            $payment = Payment::where('reference', $event->payment->reference)
                ->lockForUpdate()
                ->firstOrFail();

            $changed = $event->isPaid()
                ? $payment->markPaid($event->gatewayReference)
                : ($event->isFailed() ? $payment->markFailed($event->gatewayReference) : false);

            if (! $changed) {
                return false;
            }

            if ($event->payload !== []) {
                $payment->forceFill(['payload' => $event->payload])->save();
            }

            $this->applyEffect($payment->refresh());

            return true;
        });
    }

    /**
     * Poll the provider for a payment's current state.
     *
     * Manual gateways return null (nothing to poll), so this is a no-op
     * for them rather than an error.
     */
    public function refresh(Payment $payment): ?ChargeResult
    {
        return $this->gateway->status($payment);
    }

    private function charge(
        Model $payable,
        string $method,
        float $amount,
        string $currency,
        string $description,
        ?string $email,
        ?string $name,
    ): Payment {
        $payment = new Payment([
            'user_id' => $payable->getAttribute('user_id'),
            'payable_type' => $payable->getMorphClass(),
            'payable_id' => $payable->getKey(),
            'amount' => $amount,
            'currency' => $currency,
            'method' => $method,
            'status' => Payment::STATUS_PENDING,
            'expires_at' => now()->addDay(),
        ]);

        $request = new ChargeRequest(
            payment: $payment,
            customerEmail: $email,
            customerName: $name,
            description: $description,
        );

        $result = $this->gateway->charge($request);

        $payment->forceFill([
            'gateway' => $this->gateway->name(),
            'gateway_reference' => $result->gatewayReference,
            'instructions' => $result->instructions === [] ? null : implode("\n", $result->instructions),
            'payload' => $result->payload,
            'status' => $result->isFailed() ? Payment::STATUS_FAILED : $result->status,
            'expires_at' => now()->addMinutes($request->expiresInMinutes),
        ])->save();

        return $payment;
    }

    /**
     * Turn a settled payment into the thing the payer bought.
     *
     * Only called from apply() after the status has already moved, and
     * only for the first transition, so plain updates are enough.
     */
    private function applyEffect(Payment $payment): void
    {
        $payable = $payment->payable;

        if ($payable instanceof Donation) {
            $payable->forceFill(['status' => 'completed'])->save();

            return;
        }

        if ($payable instanceof Membership) {
            $startsAt = $payment->paid_at ?? now();
            $isFree = $payable->tier->slug === 'free';

            $payable->forceFill([
                'is_active' => true,
                'starts_at' => $startsAt,
                'expires_at' => $isFree ? null : $startsAt->copy()->addMonth(),
            ])->save();
        }
    }
}
