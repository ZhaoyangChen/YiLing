<?php

namespace App\Console;

use App\Http\Controllers\SpiderController;
use App\Jobs\SpiderJob;
use App\Jobs\SpiderMainProcess;
use App\Keyword;
use App\Lib\Spider;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $numInQueue = intval(Spider::spiderQueueStatus());
            if (SpiderController::status() == '1' && $numInQueue < 50) {
                $supplyNum = 50 - $numInQueue;
                $keywords = Keyword::orderBy('updated_at', 'ASC')->take(20 * $supplyNum)->get();
                
                $insects = array();
                foreach ($keywords as $k) {
                    $insects[] = $k->name;
                }

                for ($i =0 ;$i <$supplyNum; $i++) {
                    //\Log::info("Producing Job {$i}");
                    dispatch(new SpiderJob(array_slice($insects, $i * 20, 20), $i));
                    Spider::spiderQueuePlus();
                }
            }
        })->everyMinute();
    }

}
