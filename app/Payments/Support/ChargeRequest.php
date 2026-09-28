<?php

namespace App\Payments\Support;

use App\Models\Payment;

class ChargeRequest
{
    /**
     * @param  list<string>  $methods  Methods this provider accepts, used to
     *                                 filter the dropdown before charging.
     */
    public function __construct(
        public readonly Payment $payment,
        public readonly array $methods = [],
        public readonly ?string $customerEmail = null,
        public readonly ?string $customerName = null,
        public readonly ?string $description = null,
        public readonly ?int $expiresInMinutes = 1440,
    ) {}

    public function amount(): float
    {
        return (float) $this->payment->amount;
    }

    public function currency(): string
    {
        return $this->payment->currency;
    }

    public function reference(): string
    {
        return $this->payment->reference;
    }
}
