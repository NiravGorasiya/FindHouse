<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'facebook' => [
        'client_id' => "392495238489491",
        'client_secret' => "f133f231e26d0e4c7b000e28b3f1cfa8",
        'redirect' => 'http://localhost:8000/fbres',
    ],
    'google' => [
        'client_id' => "668182939894-0n0o132fem1ne02fqr2lmbj6gm2u4ur5.apps.googleusercontent.com",
        'client_secret' => "YVdGsBUWN0H2Txp8tWLf5azi",
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'stripe' => [
        'model' => App\Register::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SEC    RET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
