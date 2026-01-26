<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    'domain' => env('APP_DOMAIN'),

    'timezone' => 'Europe/Oslo',


    'aliases' => Facade::defaultAliases()->merge([
        // ...
    ])->toArray(),

];
