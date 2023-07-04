<?php

// config for Kilobyteno/Sureflap
use Illuminate\Support\Str;

return [
    'api_url' => env('SUREFLAP_API_URL', 'https://app.api.surehub.io/api'),
    'device_id' => env('SUREFLAP_DEVICE_ID', Str::random(32)),
    'ttl' => env('SUREFLAP_TTL', 3600), // 1 hour

    'email' => env('SUREFLAP_EMAIL'),
    'password' => env('SUREFLAP_PASSWORD'),
];
