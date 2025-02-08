<?php

namespace App\Console\Commands;

use App\Jobs\FetchEmployeeInfo;
use Illuminate\Console\Command;

class FetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch data from the URI and dispatch the job to the queue.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        FetchEmployeeInfo::dispatch();
        $this->info('job dispatched successfully.');
    }
}
