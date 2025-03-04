<?php

return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'usersx', // Changed from 'users' to 'usersx'
    ],

   'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'usersx',
    ],
],
'providers' => [
    'usersx' => [
        'driver' => 'eloquent',
        'model' => App\Models\Userx::class,
    ],
],

    'passwords' => [
        'usersx' => [
            'provider' => 'usersx',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
];