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
    protected $i;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($insects, $i)
    {
        $this->insects = $insects;
        $this->i = $i;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            //\Log::info("Job {$this->i} exeIng");
            Spider::weave($this->insects);
        } catch (\Exception $e) {
            \Log::info('Job cancel: '. $e->getMessage());
        }
        //\Log::info("Job {$this->i} exit");
        Spider::spiderQueueMinus();
    }
}
