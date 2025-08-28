<?php

namespace App\Seeders;

use App\Models\User;
use Arpon\Database\Seeder;
use Arpon\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => 'User ' . ($i + 1),
                'email' => 'example' . ($i + 1) . '@example.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}