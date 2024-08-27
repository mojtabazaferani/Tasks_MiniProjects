<?php

namespace App\Console;

use Illuminate\Support\Facades\Config;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        $schedule->call(function() {
            $response = file_get_contents('https://api.nobitex.ir/market/stats?srcCurrency=btc&dstCurrency=rls');

            $response = json_decode($response, true);
    
            $btc = $response['stats']['btc-rls']['bestBuy'];
    
            $convert = (int) $btc;

            echo $btc;

        })->everyMinute();
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
