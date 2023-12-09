<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Certification;
use App\Models\Company;
use App\Models\Course;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Social;

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

    /**
     * Display a listing of the resource.
     */
    public function dashboard(): View
    {
        $certifications = Certification::count();
        $courses = Course::count();
        $companies = Company::count();
        $experiences = Experience::count();
        $socials = Social::count();

        return view('dashboard', compact('certifications', 'courses', 'companies', 'experiences', 'socials'));
    }

    /**
     * Display a listing of the resource.
     */
    public function timeline(): View
    {
        $experiences = Experience::orderBy('ended_at', 'DESC')->orderby('started_at', 'DESC')->get();

        return view('timeline', compact('experiences'));
    }
}
