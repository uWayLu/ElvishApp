<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ScheduleMessage extends Model
{
    use HasFactory, Notifiable;

    public function getChannelIdAttribute()
    {
    }


    /**
     * 通知分類
     * Discord, Telegram, Linebot, ... , and so on
     *
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return 'Discord';
    }

    public function getContentAttribute(): string
    {
        return $this->attributes['content'] ?? "**`體力注意報`** 請登入領取您的體力支援:tada: @" . date('H:00');
    }

    public function setContentAttribute(string $content)
    {
        $this->attributes['content'] = $content;
    }

    // public function routeNotificationForDiscord()
    // {
    //     return $this->discord_channel ?? '608367277766869011';
    // }
}
