<?php

use Illuminate\Support\Facades\Facade;

return [

    'domain' => env('APP_DOMAIN'),

    'timezone' => 'Europe/Oslo',

    'aliases' => Facade::defaultAliases()->merge([
        // ...
    ])->toArray(),

];
