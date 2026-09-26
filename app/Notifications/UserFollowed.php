<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class UserFollowed extends Notification
{
    use Queueable;

    public function __construct(
        public int $followerId,
        public string $followerName,
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
            'type' => 'user_followed',
            'message' => "{$this->followerName} mulai mengikuti Anda",
            'actor_id' => $this->followerId,
            'actor_name' => $this->followerName,
            'url' => route('profile.user', ['user' => $this->followerId]),
        ];
    }
}
