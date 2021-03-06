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
            if (SpiderController::status() == '1' && $numInQueue == 0) {
                $keywords = Keyword::orderBy('updated_at', 'ASC')->take(100)->get();
                
                $insects = array();
                foreach ($keywords as $k) {
                    $insects[] = $k->name;
                }

                for ($i =0 ;$i <10; $i++) {
                    //\Log::info("Producing Job {$i}");
                    dispatch(new SpiderJob(array_slice($insects, $i * 10, 10), $i));
                    Spider::spiderQueuePlus();
                }
            }
        })->everyMinute();
    }

}
