<?php

return [
    'default' => 'paypal',
    'gateways' => [
        'stripe' => [
            'secret_key' => env('STRIPE_SECRET_KEY'),
            'publishable_key' => env('STRIPE_PUBLISHABLE_KEY'),
        ],
        'paypal' => [
            'client_id' => env('PAYPAL_CLIENT_ID'),
            'client_secret' => env('PAYPAL_CLIENT_SECRET'),
            'sandbox' => env('PAYPAL_SANDBOX', true),
        ],
        'gocardless' => [
            'access_token' => env('GOCARDLESS_ACCESS_TOKEN'),
            'environment' => env('GOCARDLESS_ENVIRONMENT', 'sandbox'),
        ],
    ],

];
