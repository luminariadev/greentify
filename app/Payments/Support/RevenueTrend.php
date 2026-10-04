<?php

namespace App\Payments\Support;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Settled revenue bucketed over time, for the operator queue.
 *
 * This is roadmap "Grafik pendapatan": the header has carried a total and
 * a "today" figure for a while, but the operator still could not see
 * whether revenue was trending up or had been flat for a month.
 *
 * Two decisions are baked in rather than left to the view:
 *
 *  1. Only `paid` counts. `refunded` is deliberately excluded — a
 *     refunded row is money that came in and went back out, and plotting
 *     it as income is the exact lie the chart exists to prevent.
 *  2. Gaps are filled with zero. Fetching only the periods that happen
 *     to have rows would draw a straight line across a week with no
 *     sales, which reads as steady revenue when it was none at all.
 *
 * Aggregation runs in PHP rather than SQL because the bucket key differs
 * per granularity and per driver (DATE_FORMAT is MySQL-only). The row set
 * is one amount column over a bounded window, so the cost is trivial
 * next to getting a driver-agnostic answer.
 */
final class RevenueTrend
{
    public const DAILY = 'daily';

    public const WEEKLY = 'weekly';

    public const MONTHLY = 'monthly';

    /**
     * How far back each granularity looks when the operator has not
     * picked a window of their own. Short enough to read as a trend,
     * long enough that a quiet week is visible as a dip and not as the
     * whole story.
     */
    private const DEFAULT_SPAN = [
        self::DAILY => 14,
        self::WEEKLY => 12,
        self::MONTHLY => 12,
    ];

    /**
     * @return list<string>
     */
    public static function granularities(): array
    {
        return [self::DAILY, self::WEEKLY, self::MONTHLY];
    }

    /**
     * Normalise whatever came off the query string.
     *
     * An unknown value falls back to daily rather than throwing: this is
     * a read-only chart on the operator's own queue, and a mangled query
     * parameter should not replace their payment queue with a 500.
     */
    public static function normaliseGranularity(mixed $value): string
    {
        return is_string($value) && in_array($value, self::granularities(), true)
            ? $value
            : self::DAILY;
    }

    public static function spanFor(string $granularity): int
    {
        return self::DEFAULT_SPAN[$granularity] ?? self::DEFAULT_SPAN[self::DAILY];
    }

    /**
     * How far back to walk when there is no explicit window.
     *
     * Expressed in *buckets* and expanded into days, because the naive
     * version — subtract spanFor() days regardless of granularity —
     * quietly produced a 12-day "weekly" chart and an 11-day "monthly"
     * one. That is not a rounding detail: an operator comparing last week
     * with the week before was comparing a week against three days.
     */
    private static function startFor(string $granularity, Carbon $end): Carbon
    {
        $buckets = self::spanFor($granularity);

        return match ($granularity) {
            self::WEEKLY => $end->copy()->subWeeks($buckets - 1)->startOfDay(),
            self::MONTHLY => $end->copy()->subMonths($buckets - 1)->startOfDay(),
            default => $end->copy()->subDays($buckets - 1)->startOfDay(),
        };
    }

    /**
     * The buckets, oldest first, with no gaps.
     *
     * @return list<array{key: string, label: string, total: float, count: int}>
     */
    public static function build(?string $granularity = null, ?Carbon $from = null, ?Carbon $to = null): array
    {
        $granularity = self::normaliseGranularity($granularity);

        $end = ($to ?? now())->copy()->endOfDay();
        $start = ($from ?? self::startFor($granularity, $end))->copy()->startOfDay();

        // A from/that arrives the wrong way round would otherwise loop
        // forever building buckets, so the window is ordered here rather
        // than trusted.
        if ($start->greaterThan($end)) {
            [$start, $end] = [$end->copy()->startOfDay(), $end];
        }

        $totals = self::sum($start, $end, $granularity);

        $buckets = [];
        $cursor = self::floorTo($start, $granularity);

        // Guard the iteration count as well as the ordering: a 40-year
        // custom window at daily granularity is 14 000 buckets, which is
        // not a chart, it is a denial of service against the operator.
        $limit = 400;

        while ($cursor->lessThanOrEqualTo($end) && count($buckets) < $limit) {
            $key = self::keyFor($cursor, $granularity);

            $buckets[$key] = [
                'key' => $key,
                'label' => self::labelFor($cursor, $granularity),
                'total' => 0.0,
                'count' => 0,
            ];

            $cursor = self::advance($cursor, $granularity);
        }

        foreach ($totals as $bucket => $figures) {
            if (isset($buckets[$bucket])) {
                $buckets[$bucket]['total'] = $figures['total'];
                $buckets[$bucket]['count'] = $figures['count'];
            }
        }

        return array_values($buckets);
    }

    /**
     * Sum of every bucket, plus the mean per bucket.
     *
     * The mean is here because "total" alone hides the thing operators
     * actually ask after a bad week: is each period worse than the one
     * before it.
     *
     * @param  list<array{key: string, label: string, total: float, count: int}>  $buckets
     * @return array{total: float, count: int, average: float, peak: float}
     */
    public static function summary(array $buckets): array
    {
        // array_sum() on an empty column returns int(0), not float, so an
        // empty chart would hand the view an int where the rest of the
        // numbers are floats — a strict comparison in a test or a type
        // error in a formatter, depending on which ran first.
        $total = (float) array_sum(array_column($buckets, 'total'));
        $count = (int) array_sum(array_column($buckets, 'count'));
        $totals = array_map(static fn (array $bucket): float => $bucket['total'], $buckets);

        return [
            'total' => $total,
            'count' => $count,
            'average' => $buckets === [] ? 0.0 : $total / count($buckets),
            'peak' => $totals === [] ? 0.0 : max($totals),
        ];
    }

    /**
     * @return array<string, array{total: float, count: int}>
     */
    private static function sum(Carbon $start, Carbon $end, string $granularity): array
    {
        $rows = self::query($start, $end)->get(['amount', 'paid_at']);

        $sums = [];

        foreach ($rows as $payment) {
            /** @var Carbon|null $paidAt */
            $paidAt = $payment->paid_at;

            // Defensive: the query already filters, but a paid row with a
            // null paid_at would otherwise floor to 1970 and add a bucket
            // outside the window.
            if ($paidAt === null) {
                continue;
            }

            // keyFor() floors internally, so a payment made on a Sunday
            // lands in the week that started on the Monday — the bucket
            // the loop already emitted.
            $bucket = self::keyFor($paidAt, $granularity);

            $sums[$bucket] ??= ['total' => 0.0, 'count' => 0];
            $sums[$bucket]['total'] += (float) $payment->amount;
            $sums[$bucket]['count']++;
        }

        return $sums;
    }

    /**
     * @return Builder<Payment>
     */
    private static function query(Carbon $start, Carbon $end): Builder
    {
        return Payment::query()
            ->where('status', Payment::STATUS_PAID)
            ->whereNotNull('paid_at')
            ->whereBetween('paid_at', [$start, $end])
            ->orderBy('paid_at');
    }

    /**
     * The first moment of the bucket containing $moment.
     *
     * startOfWeek()/startOfMonth() are declared on CarbonInterface and
     * hand back that interface, not Carbon, so each result is
     * re-wrapped — otherwise the return type here is a lie and every
     * caller downstream has to widen its own annotations.
     */
    private static function floorTo(Carbon $moment, string $granularity): Carbon
    {
        return match ($granularity) {
            self::WEEKLY => Carbon::instance($moment->copy()->startOfWeek()),
            self::MONTHLY => Carbon::instance($moment->copy()->startOfMonth()),
            default => $moment->copy()->startOfDay(),
        };
    }

    private static function advance(Carbon $moment, string $granularity): Carbon
    {
        return match ($granularity) {
            self::WEEKLY => $moment->copy()->addWeek(),
            self::MONTHLY => $moment->copy()->addMonth(),
            default => $moment->copy()->addDay(),
        };
    }

    private static function keyFor(Carbon $moment, string $granularity): string
    {
        return match ($granularity) {
            self::WEEKLY => $moment->copy()->startOfWeek()->toDateString(),
            self::MONTHLY => $moment->copy()->startOfMonth()->format('Y-m'),
            default => $moment->toDateString(),
        };
    }

    /**
     * Month abbreviations, spelled out.
     *
     * translatedFormat() would be the obvious call, but the app's
     * config/app.php ships locale 'en' and nothing ever calls
     * Carbon::setLocale() — so it rendered "04 Oct" on an interface that
     * is entirely in Indonesian. The chart is read by an operator
     * reconciling a bank statement; an English month on that axis is
     * noise they have to translate before they can use the number.
     */
    private const MONTHS = [
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
        4 => 'Apr',
        5 => 'Mei',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Agu',
        9 => 'Sep',
        10 => 'Okt',
        11 => 'Nov',
        12 => 'Des',
    ];

    /**
     * A label an operator can find on a bank statement.
     *
     * Weekly buckets are a date range rather than a week number:
     * "Minggu 3" means nothing when you are comparing it against an
     * account statement, but "28 Sep – 4 Okt" is a line on it.
     */
    private static function labelFor(Carbon $moment, string $granularity): string
    {
        return match ($granularity) {
            self::WEEKLY => self::shortDate($moment)
                .' – '
                .self::shortDate($moment->copy()->addWeek()->subDay()),
            self::MONTHLY => self::MONTHS[(int) $moment->month].' '.$moment->year,
            default => self::shortDate($moment),
        };
    }

    /**
     * "4 Okt" — no leading zero, so the axis reads as a date rather than
     * as a serial number.
     */
    private static function shortDate(Carbon $moment): string
    {
        return $moment->format('j').' '.self::MONTHS[(int) $moment->month];
    }
}
