<?php

return [
    'default'  => 'stripe',
    'gateways' => [
        'stripe'     => [
            'secret_key'      => env('STRIPE_SECRET_KEY'),
            'publishable_key' => env('STRIPE_PUBLISHABLE_KEY'),
        ],
        'paypal'     => [
            'client_id'     => env('PAYPAL_CLIENT_ID'),
            'client_secret' => env('PAYPAL_CLIENT_SECRET'),
            'mode'          => env('PAYPAL_MODE', 'sandbox'), // Can be 'sandbox' or 'live'
        ],
        'gocardless' => [
            'access_token' => env('GOCARDLESS_ACCESS_TOKEN'),
            'environment'  => env('GOCARDLESS_ENVIRONMENT', 'sandbox'),
        ],
    ],

];
