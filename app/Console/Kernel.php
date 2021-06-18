<?php

namespace App\Console;

use App\Models\ScheduleMessage;
use App\Notifications\IllusionConnectDailySupportNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Notification;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            Notification::send([new ScheduleMessage(),], new IllusionConnectDailySupportNotification);
        })->dailyAt('12:30');

        $schedule->call(function () {
            Notification::send([new ScheduleMessage(),], new IllusionConnectDailySupportNotification);
        })->dailyAt('18:00');

        $schedule->call(function () {
            Notification::send([new ScheduleMessage(),], new IllusionConnectDailySupportNotification);
        })->dailyAt('21:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
