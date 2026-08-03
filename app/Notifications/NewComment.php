<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class NewComment extends Notification
{
    use Queueable;

    public function __construct(
        public int $articleId,
        public string $articleTitle,
        public int $commenterId,
        public string $commenterName,
        public string $commentBody,
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => 'new_comment',
            'message' => "{$this->commenterName} berkomentar: \"{$this->commentBody}\"",
            'article_id' => $this->articleId,
            'article_title' => $this->articleTitle,
            'actor_id' => $this->commenterId,
            'actor_name' => $this->commenterName,
            'url' => route('articles.show', ['article' => $this->articleId]),
        ];
    }
}