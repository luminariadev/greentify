<?php

namespace App\Console\Commands;

use App\Payments\PaymentManager;
use Illuminate\Console\Command;

/**
 * Scheduled reconciliation for the payment gateway.
 *
 * With the manual gateway bound this reports zero applied, because the
 * manual gateway has no remote state to poll — the numbers still matter,
 * since staleSummary() is what tells an operator which payments will never
 * settle by themselves. Bind a real provider and the same command starts
 * settling payments without being rewritten.
 */
class ReconcilePaymentsCommand extends Command
{
    protected $signature = 'payments:reconcile
                            {--limit=100 : Maximum pending payments to poll}
                            {--summary : Only print the stale-payment summary}';

    protected $description = 'Poll the payment gateway for pending payments and report what needs attention';

    public function handle(PaymentManager $payments): int
    {
        $gateway = $payments->gatewayName();

        if (! $this->option('summary')) {
            $this->components->info("Reconciling via gateway: {$gateway}");

            $result = $payments->reconcile((int) $this->option('limit'));

            $this->components->twoColumnDetail('Checked', (string) $result['checked']);
            $this->components->twoColumnDetail('Applied', (string) $result['applied']);
            $this->components->twoColumnDetail('Skipped', (string) $result['skipped']);
        }

        $summary = $payments->staleSummary();

        $this->newLine();
        $this->components->info('Needs attention:');
        $this->components->twoColumnDetail('Awaiting operator review', (string) $summary['awaiting_review']);
        $this->components->twoColumnDetail('Pending but expired', (string) $summary['expired_pending']);
        $this->components->twoColumnDetail('Failed today', (string) $summary['failed_today']);

        if ($summary['awaiting_review'] > 0) {
            $this->newLine();
            $this->components->twoColumnDetail(
                'Queue',
                route('admin.payments.index'),
            );
        }

        // Stale payments are a reporting outcome, not a command failure —
        // they need a human, and the operator queue URL above is where.
        // Exit non-zero only if the gateway itself broke, which surfaces
        // as an exception rather than as a return code here.
        return self::SUCCESS;
    }
}
