<?php

use function Pest\Laravel\get;

it('has home page', function () {
    get('/')->assertStatus(200);
});
