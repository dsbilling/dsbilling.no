<?php

use App\Models\Post;
use function Pest\Laravel\get;

it('has blog page', function () {
    get('/blog')->assertStatus(200);
});

it('can see post on blog page', function () {
    $post = Post::factory()->create();
    get('/blog')
        ->assertStatus(200)
        ->assertSeeText($post->title);
});

it('can see post page', function () {
    $post = Post::factory()->create();
    get('/blog/'.$post->slug)->assertStatus(200);
});
