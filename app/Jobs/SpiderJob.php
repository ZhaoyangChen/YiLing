<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Lib\Spider;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SpiderJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $insects;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($insects)
    {
        $this->insects = $insects;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Spider::weave($this->insects);
        Spider::spiderQueueMinus();
    }
}
