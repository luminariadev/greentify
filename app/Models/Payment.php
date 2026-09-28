<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Payment extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';

    public const STATUS_PAID = 'paid';

    public const STATUS_FAILED = 'failed';

    public const STATUS_EXPIRED = 'expired';

    public const STATUS_REFUNDED = 'refunded';

    protected $fillable = [
        'user_id',
        'payable_type',
        'payable_id',
        'reference',
        'gateway',
        'amount',
        'currency',
        'method',
        'status',
        'gateway_reference',
        'instructions',
        'payload',
        'expires_at',
        'paid_at',
        'failed_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payload' => 'array',
        'expires_at' => 'datetime',
        'paid_at' => 'datetime',
        'failed_at' => 'datetime',
    ];

    /**
     * The webhook reconciles on this string, so it is the one value that
     * must never be a guessable counter.
     */
    protected static function booted(): void
    {
        static::creating(function (self $payment): void {
            $payment->reference ??= self::generateReference();
        });
    }

    public static function generateReference(): string
    {
        return 'GRN-'.now()->format('Ymd').'-'.strtoupper(bin2hex(random_bytes(6)));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\User, \App\Models\Payment>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo<\Illuminate\Database\Eloquent\Model, \App\Models\Payment>
     */
    public function payable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @param  Builder<Payment>  $query
     * @return Builder<Payment>
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * @param  Builder<Payment>  $query
     * @return Builder<Payment>
     */
    public function scopeSettled(Builder $query): Builder
    {
        return $query->whereIn('status', [self::STATUS_PAID, self::STATUS_REFUNDED]);
    }

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isPaid(): bool
    {
        return $this->status === self::STATUS_PAID;
    }

    public function isExpired(): bool
    {
        return $this->expires_at !== null && $this->expires_at->isPast();
    }

    /**
     * A pending payment past its expiry is reported as expired so the UI
     * can stop showing a QR code nobody will ever pay.
     */
    public function effectiveStatus(): string
    {
        if ($this->isPending() && $this->isExpired()) {
            return self::STATUS_EXPIRED;
        }

        return $this->status;
    }

    /**
     * Idempotent settlement: the gateway retries webhooks, so marking a
     * payment paid twice must not double-apply the effect.
     */
    public function markPaid(?string $gatewayReference = null): bool
    {
        if ($this->isPaid()) {
            return false;
        }

        $this->forceFill([
            'status' => self::STATUS_PAID,
            'paid_at' => now(),
            'gateway_reference' => $gatewayReference ?? $this->gateway_reference,
        ])->save();

        return true;
    }

    public function markFailed(?string $gatewayReference = null): bool
    {
        if (! $this->isPending()) {
            return false;
        }

        $this->forceFill([
            'status' => self::STATUS_FAILED,
            'failed_at' => now(),
            'gateway_reference' => $gatewayReference ?? $this->gateway_reference,
        ])->save();

        return true;
    }
}
