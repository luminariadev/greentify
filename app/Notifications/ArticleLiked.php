<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ArticleLiked extends Notification
{
    use Queueable;

    public function __construct(
        public int $articleId,
        public string $articleTitle,
        public int $likerId,
        public string $likerName,
    ) {}

    /**
     * @return list<string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => 'article_liked',
            'message' => "{$this->likerName} menyukai artikel \"{$this->articleTitle}\"",
            'article_id' => $this->articleId,
            'article_title' => $this->articleTitle,
            'actor_id' => $this->likerId,
            'actor_name' => $this->likerName,
            'url' => route('articles.show', ['article' => $this->articleId]),
        ];
    }
}
