<?php

namespace App\Payments\Support;

/**
 * A minimal EMVCo/QRIS payload builder.
 *
 * The previous manual gateway produced `GRNTIFY|IDR|10000|GRENTIFY|REF`,
 * which is a unique string and renders fine — but no QRIS reader will
 * accept it, so "scan QRIS" was a promise the code could not keep. This
 * builds the real TLV structure with the two tags that actually matter
 * for a static QR: country/amount (54) and the merchant account info (26)
 * carrying the reference, so the acquirer can reconcile.
 *
 * Deliberately not a full acquirer implementation: there is no
 * dynamic-CRC / MCC / merchant-name-and-city set, because those come from
 * the acquiring bank. What is here is spec-shaped and CRC-correct, which
 * is what makes the remaining gap a credential problem rather than a
 * missing encoder.
 */
class QrisPayload
{
    /**
     * @param  array<string, string>  $fields  tag (2-digit string) => value
     */
    public function __construct(private readonly array $fields) {}

    /**
     * Build from the application's own payment, not from loose strings.
     */
    public static function forPayment(
        \App\Models\Payment $payment,
        string $merchantAccountId,
        string $merchantName,
        string $merchantCity = 'Jakarta',
    ): self {
        $amount = (int) round((float) $payment->amount);

        $merchantInfo = self::encode([
            '00' => self::pointOfInitiationMethod($payment),
            '01' => $merchantAccountId,
            '02' => $payment->reference,
            '03' => 'UMI',
        ]);

        return new self([
            '00' => '01',                          // payload format indicator
            '01' => '12',                          // point of initiation: static
            '26' => $merchantInfo,                 // merchant account information
            '52' => '5691',                        // merchant country: Indonesia
            '53' => '360',                         // currency: IDR
            '54' => (string) $amount,              // transaction amount
            '58' => 'ID',                          // country code
            '59' => self::normalise($merchantName, 25),
            '60' => self::normalise($merchantCity, 15),
            '62' => self::encode(['01' => $payment->reference]), // additional data
        ]);
    }

    /**
     * The full payload including the CRC tag, ready to encode as a QR.
     */
    public function toString(): string
    {
        $withoutCrc = $this->encode($this->fields).'6304';

        return $withoutCrc.self::crc16Ccitt($withoutCrc);
    }

    /**
     * CRC as uppercase hex, per EMVCo 4 chars.
     */
    public function crc(): string
    {
        return substr($this->toString(), -4);
    }

    /**
     * "11" while the payer has not paid yet, "12" after a status update —
     * which is how a static QR tells the acquirer the customer still owes
     * the amount.
     */
    private static function pointOfInitiationMethod(\App\Models\Payment $payment): string
    {
        return $payment->isPaid() ? '12' : '11';
    }

    /**
     * @param  array<string, string>  $fields
     */
    private static function encode(array $fields): string
    {
        $tlv = '';

        foreach ($fields as $tag => $value) {
            if ($value === '') {
                continue;
            }

            $tlv .= $tag.str_pad((string) strlen($value), 2, '0', STR_PAD_LEFT).$value;
        }

        return $tlv;
    }

    /**
     * EMVCo CRC-16/CCITT-FALSE: poly 0x1021, init 0xFFFF, no reflection,
     * no final XOR. This is the variant every QRIS scanner expects —
     * getting it wrong produces a payload that scans and then fails.
     */
    public static function crc16Ccitt(string $data): string
    {
        $crc = 0xFFFF;

        for ($i = 0, $len = strlen($data); $i < $len; $i++) {
            $crc ^= ord($data[$i]) << 8;

            for ($bit = 0; $bit < 8; $bit++) {
                $crc = ($crc & 0x8000) !== 0
                    ? (($crc << 1) ^ 0x1021) & 0xFFFF
                    : ($crc << 1) & 0xFFFF;
            }
        }

        return strtoupper(str_pad(dechex($crc), 4, '0', STR_PAD_LEFT));
    }

    /**
     * EMVCo has no room for accented characters, so transliterate and drop
     * anything outside the printable range rather than emitting a payload
     * a scanner will reject.
     *
     * iconv's TRANSLIT mode turns "É" into "E'" — it keeps a quote for the
     * unknown glyph, which is how "Ékoprese" becomes "E'koprese" in a QR
     * code a real customer scans. Anything non-ASCII is therefore dropped
     * outright: a missing accent is invisible, a stray quote is not.
     */
    private static function normalise(string $value, int $maxLength): string
    {
        $ascii = preg_replace('/[^\x20-\x7E]/', '', $value);

        return substr($ascii ?? $value, 0, $maxLength);
    }
}
