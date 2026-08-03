<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class ReportSubmitted extends Notification
{
    use Queueable;

    public function __construct(
        public int $reportId,
        public string $reportableType,
        public int $reportableId,
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => 'report_submitted',
            'message' => 'Laporan baru dari pengguna.',
            'report_id' => $this->reportId,
            'reportable_type' => $this->reportableType,
            'reportable_id' => $this->reportableId,
            'url' => route('reports.index'),
        ];
    }
}