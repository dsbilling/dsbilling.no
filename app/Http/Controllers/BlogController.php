<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        seo()->title('Blog - '.config('app.name'));
        $posts = Post::where('published_at', '<=', now())->where('draft', false)->orderByDesc('published_at')->paginate(5);
        return view('blog.index', ['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        $post = Post::where('uuid', $param)
            ->where('draft', false)
            ->orWhere('slug', $param)
            ->where('draft', false)
            ->firstOrFail();
        abort_if(!$post, 404);
        views($post)->cooldown(60)->record();
        $html = app(\Spatie\LaravelMarkdown\MarkdownRenderer::class)
                ->toHtml($post->body);

        seo()->title($post->title.' - Blog - '.config('app.name'));
        seo()->description(strip_tags(Str::of(Str::limit($post->body, 150))->markdown()));

        return view('blog.show', ['post' => $post, 'html' => $html]);
    }
}
