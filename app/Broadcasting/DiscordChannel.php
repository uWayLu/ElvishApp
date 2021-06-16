<?php

namespace App\Broadcasting;

use Illuminate\Notifications\Notification;
use NotificationChannels\Discord\Discord;

class DiscordChannel
{
    /**
     * @var \NotificationChannels\Discord\Discord
     */
    protected $discord;

    /**
     * @param \NotificationChannels\Discord\Discord $discord
     */
    public function __construct(Discord $discord)
    {
        $this->discord = $discord;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @return array
     *
     * @throws \NotificationChannels\Discord\Exceptions\CouldNotSendNotification
     */

    public function send($notifiable, Notification $notification)
    {
        $channel = config('services.discord.channel.game');
        $message = $notification->toDiscord($notifiable);

        return $this->discord->send($channel, [
            'content' => $message->body,
            'embed' => $message->embed,
        ]);
    }
}
