<?php

namespace App\Seeders;

use App\Seeders\UserSeeder;
use Arpon\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);
    }

    protected function call(array $seeders): void
    {
        foreach ($seeders as $seeder) {
            (new $seeder())();
        }
    }
}