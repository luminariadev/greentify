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

    /**
     * Record the payer's claim that the money was sent.
     *
     * This is the fix for the self-settling bug: confirm() used to push a
     * paid event straight through apply(), so the payer both claimed and
     * settled. Now the claim only moves the payment into the operator
     * queue. Returns true when this call was the one that enqueued it.
     */
    public function submitForReview(Payment $payment, ?string $submittedBy = null): bool
    {
        return DB::transaction(function () use ($payment, $submittedBy): bool {
            $locked = Payment::whereKey($payment->getKey())->lockForUpdate()->firstOrFail();

            if (! $locked->submitForReview()) {
                return false;
            }

            if ($submittedBy !== null) {
                $locked->forceFill(['payload' => array_merge(
                    $locked->payload ?? [],
                    ['submitted_by' => $submittedBy],
                )])->save();
            }

            return true;
        });
    }

    /**
     * An operator's decision on a claimed payment.
     *
     * Approving settles the payment for real (the donation completes, the
     * membership activates) and records the reviewer. Rejecting marks it
     * failed and keeps the note so the payer knows why.
     *
     * @param  int  $reviewerId  The admin who made the call.
     */
    public function review(Payment $payment, int $reviewerId, bool $approve, ?string $note = null): bool
    {
        return DB::transaction(function () use ($payment, $reviewerId, $approve, $note): bool {
            $locked = Payment::whereKey($payment->getKey())->lockForUpdate()->firstOrFail();

            if (! $locked->isInReview()) {
                return false;
            }

            $locked->markReviewed($reviewerId, $note);

            if (! $approve) {
                $locked->markFailed('rejected_by_operator');

                return true;
            }

            $this->apply(new GatewayEvent(
                payment: $locked,
                status: Payment::STATUS_PAID,
                gatewayReference: $locked->gateway_reference,
                message: $note ?? 'Disetujui oleh operator.',
                payload: ['reviewed_by' => $reviewerId],
            ));

            return true;
        });
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
