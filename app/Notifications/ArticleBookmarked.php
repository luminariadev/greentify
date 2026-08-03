<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class ArticleBookmarked extends Notification
{
    use Queueable;

    public function __construct(
        public int $articleId,
        public string $articleTitle,
        public int $bookmarkerId,
        public string $bookmarkerName,
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => 'article_bookmarked',
            'message' => "{$this->bookmarkerName} menyimpan artikel \"{$this->articleTitle}\" di bookmark",
            'article_id' => $this->articleId,
            'article_title' => $this->articleTitle,
            'actor_id' => $this->bookmarkerId,
            'actor_name' => $this->bookmarkerName,
            'url' => route('articles.show', ['article' => $this->articleId]),
        ];
    }
}