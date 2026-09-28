<?php

namespace App\Payments\Gateways;

use App\Models\Payment;
use App\Payments\PaymentGateway;
use App\Payments\Support\ChargeRequest;
use App\Payments\Support\ChargeResult;

/**
 * The gateway used when no real provider is configured.
 *
 * It produces bank-transfer instructions and a QRIS payload instead of
 * calling out to anyone, and — importantly — it never marks a payment
 * paid. Payment only settles through PaymentManager::apply(), which is
 * driven by the confirmation endpoint or the provider webhook. That is
 * what turns the previous mock (which wrote status=completed on
 * submission) into a two-step flow that can actually fail.
 */
class ManualGateway implements PaymentGateway
{
    /**
     * Destinations shown to the payer, keyed by the payment method.
     *
     * @var array<string, array{label: string, account: string}>
     */
    private const DESTINATIONS = [
        'bank_transfer' => [
            'label' => 'Bank Central Asia (BCA)',
            'account' => '1234-5678-90',
        ],
        'ewallet' => [
            'label' => 'GoPay',
            'account' => '0812-0000-0000',
        ],
    ];

    public function name(): string
    {
        return 'manual';
    }

    public function charge(ChargeRequest $request): ChargeResult
    {
        $amount = (float) $request->payment->amount;
        $method = $request->payment->method;

        $instructions = $method === 'qris'
            ? $this->qrisInstructions($request, $amount)
            : $this->transferInstructions($request, $amount);

        return new ChargeResult(
            status: Payment::STATUS_PENDING,
            instructions: $instructions,
            gatewayReference: $request->reference(),
            qrString: $method === 'qris' ? $this->qrisPayload($request, $amount) : null,
            message: 'Transfer dulu, lalu konfirmasi agar donasi/membership diproses.',
            payload: [
                'manual' => true,
                'method' => $method,
                'amount' => $amount,
                'currency' => $request->currency(),
            ],
        );
    }

    /**
     * Nothing to poll — the manual gateway has no remote state, so the
     * caller treats null as "still pending, ask the user to confirm".
     */
    public function status(Payment $payment): ?ChargeResult
    {
        return null;
    }

    /**
     * @return list<string>
     */
    private function transferInstructions(ChargeRequest $request, float $amount): array
    {
        $destination = self::DESTINATIONS[$request->payment->method] ?? self::DESTINATIONS['bank_transfer'];

        return [
            'Transfer Rp '.number_format($amount, 0, ',', '.').' ke: '.$destination['label'],
            'Nomor rekening: '.$destination['account'],
            'Atas nama: Greentify Sustainability Fund',
            'Kode unik / reference: '.$request->reference(),
        ];
    }

    /**
     * @return list<string>
     */
    private function qrisInstructions(ChargeRequest $request, float $amount): array
    {
        return [
            'Buka aplikasi e-wallet Anda, pilih Scan QR / QRIS.',
            'Pastikan nominal tepat Rp '.number_format($amount, 0, ',', '.').'.',
            'Setelah berhasil, konfirmasi di halaman ini agar donasi tercatat.',
            'Kode unik / reference: '.$request->reference(),
        ];
    }

    /**
     * A QRIS-style payload. Not a spec-compliant EMVCo string yet — that
     * comes from the acquirer — but it is unique per payment and safe to
     * render, which is what the current UI needs.
     */
    private function qrisPayload(ChargeRequest $request, float $amount): string
    {
        return sprintf(
            'GRNTIFY|IDR|%d|GRENTIFY|%s',
            (int) $amount,
            $request->reference(),
        );
    }
}
