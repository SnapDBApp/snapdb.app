<?php

return [
    'client_side_token' => env('PADDLE_CLIENT_SIDE_TOKEN'),
    'webhook_secret_key' => env('PADDLE_WEBHOOK_SECRET_KEY'),

    // Only allow requests from these IP addresses
    'ip-whitelist' => [
        '127.0.0.1',

        // Paddle PRD
        '34.232.58.13',
        '34.195.105.136',
        '34.237.3.244',
        '35.155.119.135',
        '52.11.166.252',
        '34.212.5.7',

        // Paddle sandbox
        '34.194.127.46',
        '54.234.237.108',
        '3.208.120.145',
        '44.226.236.210',
        '44.241.183.62',
        '100.20.172.113',
    ]
];
