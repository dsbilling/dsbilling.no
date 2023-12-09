<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use romanzipp\Seo\Structs\Meta;
use romanzipp\Seo\Structs\Meta\OpenGraph;
use romanzipp\Seo\Structs\Meta\Twitter;
use romanzipp\Seo\Structs\Script;
use Symfony\Component\HttpFoundation\Response;

class AddSeoDefaults
{
    public function handle(Request $request, Closure $next): Response
    {
        seo()->charset();
        seo()->viewport();

        seo()->csrfToken();

        seo()->title(config('app.name'));
        seo()->description('Just my personal website.');

        seo()->addMany([

            Meta::make()->name('copyright')->content('Daniel S. Billing'),

            Meta::make()->name('mobile-web-app-capable')->content('yes'),
            Meta::make()->name('theme-color')->content('#fb923c'),

            OpenGraph::make()->property('title')->content('Daniel S. Billing'),
            OpenGraph::make()->property('site_name')->content('Daniel S. Billing'),
            OpenGraph::make()->property('locale')->content('en_US'),

            Twitter::make()->name('card')->content('summary_large_image'),
            Twitter::make()->name('site')->content('@dsbilling'),
            Twitter::make()->name('creator')->content('@dsbilling'),
            Twitter::make()->name('image')->content(asset('/img/banner.jpg'), false),

        ]);

        seo('body')->add(
            Script::make()->attr('src', '/js/app.js')
        );

        return $next($request);
    }
}
