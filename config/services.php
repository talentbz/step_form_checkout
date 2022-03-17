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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
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

    'stripe' => [
        'key' => 'pk_test_51Kd24KI1ALVfJU3ioVluIxaZ3K0c3Y9OUaFFTO9yV6D3949AEDWmBHRUEEDVxds8XNPWpw4H7V6z8L5uylvVHdlF00LkI82GPW',
        'secret' => 'sk_test_51Kd24KI1ALVfJU3i21D0z6g6qhlkrfOJqMM5VbkPfYTBu5PoIaa3j7HaQvkeR75wtKil5k3rIAE5WBafdfXJZb5p00t2meOqwt',
    ],

];
