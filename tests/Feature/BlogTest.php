<?php

use function Pest\Laravel\get;

it('has blog page', function () {
    get('/blog')->assertStatus(200);
});
