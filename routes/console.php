<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/*
|--------------------------------------------------------------------------
| Scheduled work
|--------------------------------------------------------------------------
|
| Both of these existed as commands and were never registered here, which
| made the roadmap's "run payments:reconcile every 5 minutes" a sentence
| rather than code. `schedule:list` is how you confirm they fire.
|
*/

// Poll the gateway for pending payments and report what needs a human.
Schedule::command('payments:reconcile')
    ->everyFiveMinutes()
    ->withoutOverlapping()
    ->onOneServer();

// Move pending payments whose window has closed into `expired`. Every
// minute because the difference between "expired" and "still pending" is
// what the payer sees on the payment page, and a stale pending row also
// inflates every pending count. Cheap: the query is indexed and the
// result set is empty on a healthy day.
Schedule::command('payments:expire-stale')
    ->everyMinute()
    ->withoutOverlapping()
    ->onOneServer();
