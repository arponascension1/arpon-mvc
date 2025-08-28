<?php

namespace App\Console\Commands;

use Arpon\Console\Command;
use App\Seeders\DatabaseSeeder;

class DbSeedCommand extends Command
{
    protected string $signature = 'db:seed';
    protected string $description = 'Seed the database with records';

    public function handle(): int
    {
        $this->info('Seeding database...');
        (new DatabaseSeeder())();
        $this->info('Database seeded successfully.');
        return 0;
    }
}
