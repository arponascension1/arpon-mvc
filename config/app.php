<?php
// config/app.php

return [
    'name' => env('APP_NAME', 'Your Awesome Framework'),
    'env' => env('APP_ENV', 'production'),
    'debug' => env('APP_DEBUG', true),
    'timezone' => 'UTC',
    'url' => env('APP_URL', 'http://localhost'),

    'hashing' => [
        'driver' => 'bcrypt',
    ],

    'providers' => [

    ],

    'aliases' => [
        //mak
    ],
];