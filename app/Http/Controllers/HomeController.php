<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Company;
use App\Models\Course;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Social;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::where('published_at', '<=', now())->where('draft', false)->orderByDesc('published_at')->take(3)->get();
        $experiences = Experience::where('type', 'full-time')->orderByRaw('-ended_at ASC')->orderby('started_at', 'DESC')->take(5)->get();

        return view('home', compact('posts', 'experiences'));
    }

}
