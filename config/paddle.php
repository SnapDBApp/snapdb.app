<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paddle accept purchases
    |--------------------------------------------------------------------------
    |
    | Set to false to disable purchases on the website. This is useful for
    | testing purposes or when you want to temporarily disable purchases.
    |
    */

    'accept_purchases' => env('PADDLE_ACCEPT_PURCHASES', false),

    /*
    |--------------------------------------------------------------------------
    | Paddle API Base URL
    |--------------------------------------------------------------------------
    |
    | This is the base URL for Paddle's API. You can configure it to point
    | to the production or sandbox environment. By default, it uses the
    | sandbox URL for testing purposes.
    |
    */

    'api_base_url' => env('PADDLE_API_BASE_URL', 'https://sandbox-api.paddle.com'),

    /*
    |--------------------------------------------------------------------------
    | Paddle API Key
    |--------------------------------------------------------------------------
    |
    | This is the API key used to authenticate requests to Paddle's API.
    | Make sure to set this in your environment file to ensure secure
    | access to the API.
    |
    */

    'api_key' => env('PADDLE_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Paddle Client-Side Token
    |--------------------------------------------------------------------------
    |
    | This token is used for client-side integrations with Paddle. Ensure
    | this value is correctly set in your environment file for your
    | application's client-side interactions with Paddle.
    |
    */

    'client_side_token' => env('PADDLE_CLIENT_SIDE_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Paddle Webhook Secret Key
    |--------------------------------------------------------------------------
    |
    | This key is used to verify the authenticity of incoming webhook
    | requests from Paddle. Always keep this value secure and set it
    | in your environment file.
    |
    */

    'webhook_secret_key' => env('PADDLE_WEBHOOK_SECRET_KEY'),

    /*
    |--------------------------------------------------------------------------
    | IP Whitelist for Paddle Requests
    |--------------------------------------------------------------------------
    |
    | Only allow requests originating from the following IP addresses. This
    | is an additional security measure to ensure that only Paddle's servers
    | can communicate with your application. These include both production
    | and sandbox IP addresses.
    |
    */

    'ip-whitelist' => [

        // Local development IP
        '127.0.0.1',

        // Paddle Production IPs
        '34.232.58.13',
        '34.195.105.136',
        '34.237.3.244',
        '35.155.119.135',
        '52.11.166.252',
        '34.212.5.7',

        // Paddle Sandbox IPs
        '34.194.127.46',
        '54.234.237.108',
        '3.208.120.145',
        '44.226.236.210',
        '44.241.183.62',
        '100.20.172.113',
    ],

    /*
    |--------------------------------------------------------------------------
    | Price IDs
    |--------------------------------------------------------------------------
    */

    'price_ids' => [
        'lifetime' => env('PADDLE_PRICE_ID_LIFETIME'),
    ],
];
