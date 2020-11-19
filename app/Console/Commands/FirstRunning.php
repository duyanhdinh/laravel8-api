<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class FirstRunning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'first:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to run first';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("~~~Start Migrate!~~~");
        Artisan::call('migrate');
        $this->info(Artisan::output());
        $this->info("~~~End Migrate!~~~");

        $this->info("~~~Create Passport!~~~");
        Artisan::call('passport:keys --force');
        $this->info(Artisan::output());
        $this->info("Passport seed");
        Artisan::call('db:seed --class=PassportSeeder');
        $this->info("~~~End create Passport!~~~");
    }
}
