<?php

namespace App\Console\Commands;

use App\Models\Services\ApiService;
use Illuminate\Console\Command;

class CallApiLocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:location';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    protected $apiService;

    public function __construct(ApiService $apiService) {
        parent::__construct();
        $this->apiService = $apiService;
    }

    public function handle()
    {
        $this->apiService->location();
        $this->info('Data saved successfully');
    }
}
