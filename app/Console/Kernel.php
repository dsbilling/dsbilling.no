<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Spatie\Health\Commands\ScheduleCheckHeartbeatCommand;
use Spatie\ScheduleMonitor\Models\MonitoredScheduledTaskLogItem;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Often commands
        $schedule->command(RunHealthChecksCommand::class)->everyMinute();
        $schedule->command(ScheduleCheckHeartbeatCommand::class)->everyMinute();
        // Daily commands
        $schedule->command('model:prune', ['--model' => MonitoredScheduledTaskLogItem::class])->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
