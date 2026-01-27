<?php

return [

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'rybbit' => [
        'instance_url' => env('RYBBIT_INSTANCE_URL'),
        'site_id' => env('RYBBIT_SITE_ID'),
    ],

];
