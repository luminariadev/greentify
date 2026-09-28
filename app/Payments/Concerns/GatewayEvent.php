<?php

namespace App\Payments\Concerns;

use App\Models\Payment;

/**
 * A webhook body, already decoded and normalised.
 *
 * Every provider gets its own handler that maps its payload into this
 * shape, so the reconciliation code below never has to know which
 * provider called it.
 */
class GatewayEvent
{
    /**
     * @param  string  $status  One of the Payment::STATUS_* values.
     * @param  array<string, mixed>  $payload  Raw provider JSON, kept for auditing.
     */
    public function __construct(
        public readonly Payment $payment,
        public readonly string $status,
        public readonly ?string $gatewayReference = null,
        public readonly ?string $message = null,
        public readonly array $payload = [],
    ) {}

    public function isPaid(): bool
    {
        return $this->status === Payment::STATUS_PAID;
    }

    public function isFailed(): bool
    {
        return in_array($this->status, [Payment::STATUS_FAILED, Payment::STATUS_EXPIRED], true);
    }
}
