<?php

namespace App\Payments\Support;

class ChargeResult
{
    /**
     * @param  string  $status  One of the Payment::STATUS_* values.
     * @param  list<string>  $instructions  Human-readable steps the payer
     *                                      follows (VA number, QRIS payload…).
     */
    public function __construct(
        public readonly string $status,
        public readonly array $instructions = [],
        public readonly ?string $gatewayReference = null,
        public readonly ?string $qrString = null,
        public readonly ?string $redirectUrl = null,
        public readonly ?string $message = null,
        public readonly array $payload = [],
    ) {}

    public function isPending(): bool
    {
        return $this->status === \App\Models\Payment::STATUS_PENDING;
    }

    public function isPaid(): bool
    {
        return $this->status === \App\Models\Payment::STATUS_PAID;
    }

    public function isFailed(): bool
    {
        return $this->status === \App\Models\Payment::STATUS_FAILED;
    }
}
