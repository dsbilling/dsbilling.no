<?php

namespace App\Http\Middleware;

use Closure;
use romanzipp\Seo\Structs\Link;
use romanzipp\Seo\Structs\Meta;
use romanzipp\Seo\Structs\Meta\OpenGraph;
use romanzipp\Seo\Structs\Meta\Twitter;
use romanzipp\Seo\Structs\Script;

class AddSeoDefaults
{
    public function handle($request, Closure $next)
    {
        seo()->charset();
        seo()->viewport();

        seo()->csrfToken();

        seo()->addMany([

            Meta::make()->name('copyright')->content('Daniel S. Billing'),

            Meta::make()->name('mobile-web-app-capable')->content('yes'),
            Meta::make()->name('theme-color')->content('#fb923c'),

            OpenGraph::make()->property('title')->content('Daniel S. Billing'),
            OpenGraph::make()->property('site_name')->content('Daniel S. Billing'),
            OpenGraph::make()->property('locale')->content('en_US'),

            Twitter::make()->name('card')->content('summary_large_image'),
            Twitter::make()->name('site')->content('@danielrtrd'),
            Twitter::make()->name('creator')->content('@danielrtrd'),
            Twitter::make()->name('image')->content('/img/banner.jpg', false),

        ]);
        
        seo('body')->add(
            Script::make()->attr('src', '/js/app.js')
        );

        return $next($request);
    }
}