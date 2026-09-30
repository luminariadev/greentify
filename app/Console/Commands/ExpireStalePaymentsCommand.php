<?php

namespace App\Console\Commands;

use App\Models\Payment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

/**
 * Sweep dead payment windows into the `expired` status.
 *
 * Payment::effectiveStatus() computed "expired" for the view but never
 * wrote it, so a payment whose QR had been closed for a week still sat
 * in the table saying `pending` — it still counted towards every pending
 * total, and the payer could still press "I have transferred" on a code
 * no bank would accept.
 *
 * Only `pending` is touched. A payment already claimed (`in_review`) keeps
 * its status no matter how old it is, because the money may well have
 * landed and the operator is the one who has to decide that.
 *
 * Scheduled every minute; cheap because expiredPending() is indexed on
 * (status, expires_at) and the table is normally empty by the time it runs.
 */
class ExpireStalePaymentsCommand extends Command
{
    protected $signature = 'payments:expire-stale
                            {--limit=500 : Maximum rows to sweep in one pass}';

    protected $description = 'Mark pending payments whose expiry window has closed as expired';

    public function handle(): int
    {
        $expired = 0;
        $skipped = 0;

        $rows = Payment::query()
            ->expiredPending()
            ->oldest('id')
            ->limit((int) $this->option('limit'))
            ->get();

        foreach ($rows as $payment) {
            // markExpired() re-checks status and expiry under the row it
            // just loaded, so a payment an operator approved in the
            // microsecond between the SELECT and here is not clobbered.
            if ($payment->markExpired()) {
                $expired++;
            } else {
                $skipped++;
            }
        }

        if ($expired > 0) {
            $this->components->info("{$expired} pending payment(s) marked expired.");

            // The count is the thing an operator watches to know the
            // sweeper is alive, so it is worth a log line once a day at
            // minimum and free of noise when there is nothing to do.
            Log::info('payments:expire-stale swept rows', [
                'expired' => $expired,
                'skipped' => $skipped,
            ]);
        }

        if ($skipped > 0) {
            $this->components->twoColumnDetail('Skipped (no longer pending)', (string) $skipped);
        }

        return self::SUCCESS;
    }
}
