<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'paypal.live' => [
        'client_id' => 'AVf7U5L7aJHOX816431O-cYaNc7QLh3tniqtI91GXsXkZSK4Q_KWJfqgO-Q3K6PzRoM4TjdTl3PERrgi',
        'secret' => 'EFcGjr2w-LL9ZV1c8HIfNX_vFqyV13SjJXlzm42-hA0t7ZeftkrhhX2jZXQFBnI-jryzsyx2YrPCisi6',
        'mode' => 'live',
        'endpoint' => 'https://api.paypal.com',

     ],
    'paypal' => [
        'client_id' => 'ARrRHF5jtsIOCzX4qqw2CjKc_A9wQ322xdOQKNowyijyOCOpT0SiZMXrgCe70D2t7RDrPgX_QpU8NkNK',
        'secret' => 'EJ49M4l4lbR0Tl948BHv79lj_OkmvX78UApZK4NLDG2sI-caUIrKv-WMiRb4_HStKb96LXx2O7_EaUKs',
        'mode' => 'sandbox',
        'endpoint' => 'https://api.sandbox.paypal.com',
    ],

];
