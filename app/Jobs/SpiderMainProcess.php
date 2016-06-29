<?php

namespace App\Jobs;

use App\Http\Controllers\SpiderController;
use App\Jobs\Job;
use App\Lib\Spider;
use Illuminate\Support\Facades\Redis;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SpiderMainProcess extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $NumOfinsects = 100;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        set_time_limit(600);
        while(SpiderController::status()) {
            Spider::weave($this->NumOfinsects);
        }

    }
}
