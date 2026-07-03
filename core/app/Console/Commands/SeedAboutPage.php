<?php

namespace App\Console\Commands;

use Database\Seeders\Landlord\AboutPageSeeder;
use Illuminate\Console\Command;

class SeedAboutPage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:about-page';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed About page with Lexend widgets and data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Seeding About page widgets...');
        
        $seeder = new AboutPageSeeder();
        $seeder->setCommand($this);
        $seeder->run();
        
        $this->info('Done! About page widgets have been created.');
        $this->warn('Remember to upload images and update image IDs in Page Builder.');
        
        return 0;
    }
}
