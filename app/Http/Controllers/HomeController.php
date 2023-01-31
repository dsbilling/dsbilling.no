<?php

namespace App\Http\Controllers;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('published_at', '<=', now())->where('draft', false)->orderByDesc('published_at')->take(4)->get();
        $poststotalcount = Post::where('published_at', '<=', now())->where('draft', false)->count();

        return view('home', compact('posts', 'poststotalcount'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
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
     *
     * @return \Illuminate\Http\Response
     */
    public function timeline()
    {
        $experiences = Experience::orderBy('ended_at', 'DESC')->orderby('started_at', 'DESC')->get();

        return view('timeline', compact('experiences'));
    }
}
