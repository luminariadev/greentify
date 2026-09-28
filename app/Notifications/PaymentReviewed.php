<?php

namespace App\Notifications;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

/**
 * Tells the payer their payment left the operator queue.
 *
 * Without this the approve/reject buttons are silent to the person who
 * actually transferred the money — the payment page sits on "menunggu
 * verifikasi" until they happen to refresh. The note is included because
 * a rejection is otherwise indistinguishable from a bug.
 */
class PaymentReviewed extends Notification
{
    use Queueable;

    public function __construct(
        public string $reference,
        public bool $approved,
        public ?string $note = null,
    ) {}

    /**
     * @return list<string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => 'payment_reviewed',
            'approved' => $this->approved,
            'reference' => $this->reference,
            'message' => $this->message(),
            'note' => $this->note,
            'amount_label' => $this->amountLabel(),
            'url' => route('payments.show', ['reference' => $this->reference]),
        ];
    }

    private function message(): string
    {
        if (! $this->approved) {
            return "Pembayaran {$this->reference} belum diverifikasi. "
                .($this->note !== null && $this->note !== ''
                    ? "Alasan: {$this->note}"
                    : 'Silakan hubungi admin untuk detail.');
        }

        return "Pembayaran {$this->reference} sudah diverifikasi dan diterima. Terima kasih!";
    }

    /**
     * The amount lives on the payment row, not on the notification, and a
     * notification outlives the request that created it — so read it here
     * rather than storing a formatted string.
     */
    private function amountLabel(): string
    {
        $amount = Payment::where('reference', $this->reference)->value('amount');

        return $amount === null
            ? ''
            : 'Rp '.number_format((float) $amount, 0, ',', '.');
    }
}
