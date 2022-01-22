<?php

use App\Models\Post;
use function Pest\Laravel\get;

beforeEach(fn () => Post::factory()->create(['title' => 'Post 1', 'slug' => 'post-1']));

it('has blog page', function () {
    get('/blog')->assertStatus(200);
});

it('has posts')->assertDatabaseHas('posts', [
    'slug' => 'post-1',
]);

it('can see post on blog page', function () {
    expect(get('/blog'))
        ->assertStatus(200)
        ->assertSee('Post 1');
});

it('can see post page', function () {
    expect(get('/blog/post-1'))
        ->assertStatus(200)
        ->assertSee('Post 1');
});