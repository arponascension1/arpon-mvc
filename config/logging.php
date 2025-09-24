<?php

return [
    'default' => env('LOG_CHANNEL', 'single'),

    'channels' => [
        'single' => [
            'driver' => 'single',
            'path' => __DIR__.'/../debug.log',
            'level' => 'debug',
        ],
    ],
];
