<?php

namespace App\Payments\Gateways;

use App\Models\Payment;
use App\Payments\PaymentGateway;
use App\Payments\Support\ChargeRequest;
use App\Payments\Support\ChargeResult;
use App\Payments\Support\QrisPayload;
use Illuminate\Support\Facades\Config;

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
            qrString: $method === 'qris' ? $this->qrisPayload($request) : null,
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
        $accountName = (string) Config::get('services.payments.bank.account_name');
        $accountNumber = (string) Config::get('services.payments.bank.account_number');

        return [
            'Transfer Rp '.number_format($amount, 0, ',', '.').' ke rekening Greentify.',
            'Nomor rekening: '.$accountNumber,
            'Atas nama: '.$accountName,
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
     * A real EMVCo/QRIS payload: TLV-encoded, CRC-tagged, and carrying
     * the payment reference so the acquirer can reconcile a static QR
     * against our payments table.
     */
    private function qrisPayload(ChargeRequest $request): string
    {
        return QrisPayload::forPayment(
            payment: $request->payment,
            merchantAccountId: (string) Config::get('services.payments.qris.merchant_account_id'),
            merchantName: (string) Config::get('services.payments.qris.merchant_name'),
            merchantCity: (string) Config::get('services.payments.qris.merchant_city'),
        )->toString();
    }
}
