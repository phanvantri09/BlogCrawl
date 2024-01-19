<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\CrawlAPI;
use App\Jobs\CrawlVideo;
use App\Jobs\CrawlComplaint;
use App\Jobs\CrawlBroker;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->job(new CrawlAPI)->everyMinute();
        // $schedule->job(new CrawlVideo)->everyMinute();
        // $schedule->job(new CrawlComplaint)->everyMinute();
        $schedule->job(new CrawlBroker)->everyMinute();
        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
