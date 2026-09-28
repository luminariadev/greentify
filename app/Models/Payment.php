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

    /**
     * The payer said they transferred, an operator has not looked yet.
     *
     * This is the state that stops a payment from being self-settled:
     * arriving here is the payer's claim, leaving it is the operator's
     * decision.
     */
    public const STATUS_IN_REVIEW = 'in_review';

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
        'submitted_at',
        'reviewed_by',
        'reviewed_at',
        'review_note',
        'paid_at',
        'failed_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payload' => 'array',
        'expires_at' => 'datetime',
        'submitted_at' => 'datetime',
        'reviewed_at' => 'datetime',
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
     * The operator who made the call, if it was reviewed.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\User, \App\Models\Payment>
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
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

    /**
     * The operator queue: awaiting a human, oldest claim first.
     *
     * @param  Builder<Payment>  $query
     * @return Builder<Payment>
     */
    public function scopeAwaitingReview(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_IN_REVIEW)->oldest('submitted_at');
    }

    public function isPending(): bool
    {
        return in_array($this->status, [self::STATUS_PENDING, self::STATUS_IN_REVIEW], true);
    }

    public function isInReview(): bool
    {
        return $this->status === self::STATUS_IN_REVIEW;
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
     * can stop showing a QR code nobody will ever pay. A payment already
     * in review keeps its status — the money may well have landed, and
     * that is exactly what the operator is being asked to check.
     */
    public function effectiveStatus(): string
    {
        if ($this->status === self::STATUS_PENDING && $this->isExpired()) {
            return self::STATUS_EXPIRED;
        }

        return $this->status;
    }

    /**
     * The payer's claim: move a pending payment into the operator queue.
     *
     * Idempotent, so a double-click on the confirm button cannot create
     * two queue entries or reset a decision already made.
     */
    public function submitForReview(): bool
    {
        if ($this->status !== self::STATUS_PENDING) {
            return false;
        }

        $this->forceFill([
            'status' => self::STATUS_IN_REVIEW,
            'submitted_at' => now(),
        ])->save();

        return true;
    }

    /**
     * The operator's decision, on both outcomes.
     */
    public function markReviewed(?int $reviewerId, ?string $note = null): void
    {
        $this->forceFill([
            'reviewed_by' => $reviewerId,
            'reviewed_at' => now(),
            'review_note' => $note,
        ])->save();
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
