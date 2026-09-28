<?php

namespace Tests\Unit;

use App\Models\Payment;
use App\Payments\Support\QrisPayload;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * The EMVCo payload, checked against the spec rather than against itself.
 *
 * The old pipe-delimited placeholder passed any test written against
 * itself. These use the standard CRC check value and a hand-decoded TLV
 * walk, so a wrong tag or length fails even though the string still
 * renders.
 */
class QrisPayloadTest extends TestCase
{
    public function test_crc_matches_the_standard_check_value(): void
    {
        // CRC-16/CCITT-FALSE: "123456789" -> 0x29B1. Any other variant
        // (XMODEM, KERMIT, reflected) gives a different answer, and a
        // scanner rejects a payload with the wrong CRC.
        $this->assertSame('29B1', QrisPayload::crc16Ccitt('123456789'));
    }

    #[DataProvider('crcVectors')]
    public function test_crc_handles_edge_cases(string $input, string $expected): void
    {
        $this->assertSame($expected, QrisPayload::crc16Ccitt($input));
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function crcVectors(): array
    {
        return [
            'empty stays at init value' => ['', 'FFFF'],
            'single char' => ['A', 'B915'],
            'eight zero bytes' => [str_repeat("\0", 8), '313E'],
        ];
    }

    public function test_crc_is_always_four_uppercase_hex_chars(): void
    {
        foreach (['', '1', 'test', str_repeat('QRIS', 40)] as $input) {
            $crc = QrisPayload::crc16Ccitt($input);

            $this->assertMatchesRegularExpression('/^[0-9A-F]{4}$/', $crc);
        }
    }

    public function test_payload_ends_with_the_crc_tag_matching_its_contents(): void
    {
        $payload = QrisPayload::forPayment(
            payment: $this->payment(),
            merchantAccountId: 'ID1024398201947',
            merchantName: 'GREENTIFY',
        )->toString();

        $this->assertSame('6304', substr($payload, -8, 4), 'The CRC must sit in tag 63 length 04.');

        $body = substr($payload, 0, -4);
        $declared = substr($payload, -4);
        $recomputed = QrisPayload::crc16Ccitt($body);

        $this->assertSame(
            $recomputed,
            $declared,
            'A payload whose CRC does not match its own bytes is exactly what a scanner rejects.',
        );
    }

    public function test_payload_decodes_to_the_expected_tags(): void
    {
        $payment = $this->payment(amount: 25000);

        $payload = QrisPayload::forPayment(
            payment: $payment,
            merchantAccountId: 'ID1024398201947',
            merchantName: 'GREENTIFY',
            merchantCity: 'Bandung',
        )->toString();

        $tags = $this->decode($payload);

        $this->assertSame('01', $tags['00'], 'Payload format indicator.');
        $this->assertSame('12', $tags['01'], 'Point of initiation: static.');
        $this->assertSame('5691', $tags['52'], 'Merchant country must be Indonesia.');
        $this->assertSame('360', $tags['53'], 'Currency must be IDR.');
        $this->assertSame('25000', $tags['54'], 'Transaction amount.');
        $this->assertSame('ID', $tags['58'], 'Country code.');
        $this->assertSame('GREENTIFY', $tags['59'], 'Merchant name.');
        $this->assertSame('Bandung', $tags['60'], 'Merchant city.');
    }

    public function test_the_reference_is_embedded_so_an_acquirer_can_reconcile(): void
    {
        $payment = $this->payment();

        $payload = QrisPayload::forPayment(
            payment: $payment,
            merchantAccountId: 'ID1024398201947',
            merchantName: 'GREENTIFY',
        )->toString();

        // Twice: once in the merchant account info, once in the additional
        // data. Either alone is enough to tie a statement line to a row.
        $this->assertStringContainsString($payment->reference, $payload);

        $merchantInfo = $this->decodeSub($this->decode($payload)['26']);

        $this->assertSame($payment->reference, $merchantInfo['02']);
        $this->assertSame('ID1024398201947', $merchantInfo['01']);
    }

    public function test_point_of_initiation_flips_once_the_payment_is_paid(): void
    {
        $unpaid = $this->payment();
        $paid = $this->payment(status: Payment::STATUS_PAID);

        $unpaidTags = $this->decode(QrisPayload::forPayment($unpaid, 'ID1', 'GREENTIFY')->toString());
        $paidTags = $this->decode(QrisPayload::forPayment($paid, 'ID1', 'GREENTIFY')->toString());

        $this->assertSame(
            '11',
            $this->decodeSub($unpaidTags['26'])['00'],
            '11 = static, customer still owes the amount.',
        );
        $this->assertSame(
            '12',
            $this->decodeSub($paidTags['26'])['00'],
            '12 = static, amount already settled.',
        );
    }

    public function test_amount_is_truncated_to_whole_rupiah(): void
    {
        $tags = $this->decode(
            QrisPayload::forPayment($this->payment(amount: 12345.67), 'ID1', 'GREENTIFY')->toString()
        );

        // IDR has no minor unit; a decimal point would make it unscannable.
        $this->assertSame('12346', $tags['54']);
    }

    public function test_non_ascii_merchant_names_are_normalised_not_rejected(): void
    {
        $tags = $this->decode(
            QrisPayload::forPayment(
                $this->payment(),
                'ID1',
                // "É" must be dropped, not transliterated into "E'" —
                // iconv TRANSLIT keeps a quote for the unknown glyph, which
                // would ship a stray apostrophe inside a scannable QR.
                'Greentify Ékoprese',
                'Kota Bandung',
            )->toString()
        );

        $this->assertSame('Greentify koprese', $tags['59']);
        $this->assertSame('Kota Bandung', $tags['60']);
    }

    public function test_merchant_name_is_capped_at_the_emvco_limit(): void
    {
        $tags = $this->decode(
            QrisPayload::forPayment($this->payment(), 'ID1', str_repeat('A', 40))->toString()
        );

        $this->assertSame(str_repeat('A', 25), $tags['59']);
    }

    public function test_two_payments_never_share_a_payload(): void
    {
        // Same amount, same merchant — only the reference differs, which
        // is the only thing a static QR has to disambiguate.
        $first = QrisPayload::forPayment($this->payment(reference: 'GRN-A'), 'ID1', 'GREENTIFY')->toString();
        $second = QrisPayload::forPayment($this->payment(reference: 'GRN-B'), 'ID1', 'GREENTIFY')->toString();

        $this->assertNotSame(
            $first,
            $second,
            'A static QR that is identical between payments cannot be reconciled.',
        );
    }

    /**
     * Walk the TLV structure and return tag => value.
     *
     * @return array<string, string>
     */
    private function decode(string $payload): array
    {
        // The CRC tag is part of the payload, not a suffix to be trimmed —
        // decodeSub() stops when it reaches it.
        return $this->decodeSub($payload, stopAtCrcTag: true);
    }

    /**
     * @return array<string, string>
     */
    private function decodeSub(string $tlv, bool $stopAtCrcTag = false): array
    {
        $tags = [];
        $position = 0;
        $length = strlen($tlv);

        while ($position + 4 <= $length) {
            $tag = substr($tlv, $position, 2);
            $size = (int) substr($tlv, $position + 2, 2);
            $value = substr($tlv, $position + 4, $size);

            $this->assertSame(
                $size,
                strlen($value),
                "Tag {$tag} declares {$size} bytes but carries ".strlen($value),
            );

            $tags[$tag] = $value;
            $position += 4 + $size;

            if ($stopAtCrcTag && $tag === '63') {
                break;
            }
        }

        return $tags;
    }

    private function payment(
        float $amount = 50000,
        string $status = Payment::STATUS_PENDING,
        ?string $reference = null,
    ): Payment {
        $payment = new Payment([
            'reference' => $reference ?? 'GRN-'.now()->format('Ymd').'-TESTPAY01',
            'amount' => $amount,
            'currency' => 'IDR',
            'method' => 'qris',
            'status' => $status,
        ]);

        // Not persisted: QrisPayload only reads attributes.
        $payment->id = 1;

        return $payment;
    }
}
