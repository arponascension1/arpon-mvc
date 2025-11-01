<?php

namespace App\Seeders;

use App\Models\User;
use Arpon\Support\Facades\Hash;

class UserSeeder
{
    public function __invoke()
    {
    
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
