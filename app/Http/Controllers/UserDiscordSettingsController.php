<?php

namespace App\Http\Controllers;

use App\Models\ScheduleMessage;
use App\Notifications\IllusionConnectDailySupportNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Discord\Discord;

class UserDiscordSettingsController extends Controller
{
    public function store(Request $request)
    {
        $userId = $request->input('discord_user_id');
        $channelId = app(Discord::class)->getPrivateChannel($userId);

        Auth::user()->update([
            'discord_user_id' => $userId,
            'discord_private_channel_id' => $channelId,
        ]);
    }

    public function show(Request $request)
    {
        /**
         * me: 595887844573052929, me_c: 854645730983411733
         * game: 631016746907729931
         *
         *
         */

        $userId = '595887844573052929';
        $channelId = app(Discord::class)->getPrivateChannel($userId);

        $scheduleMsg = new ScheduleMessage;
        $scheduleMsg->content = '大家豪，請多多指交';
        Notification::send($scheduleMsg, new IllusionConnectDailySupportNotification);

        return response()->json([
            'discord_user_id' => $userId,
            'discord_private_channel_id' => $channelId,
        ]);
    }
}
