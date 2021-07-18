<?php

namespace App\Models;

use Carbon\Carbon;
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
        $start = '00:00';
        $end = '23:59';

        $illusionTime = [
            ['start' => '11:00', 'end' => '14:00'],
            ['start' => '17:00', 'end' => '20:00'],
            ['start' => '21:00', 'end' => '23:00'],
        ];

        foreach ($illusionTime as $time) {
            extract($time);
            if (Carbon::now()->between($start, $end)) {
                break;
            }
        }

        return $this->attributes['content'] ?? "**`體力注意報`** 請登入領取您的體力支援:tada: @$start ~ $end";
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
