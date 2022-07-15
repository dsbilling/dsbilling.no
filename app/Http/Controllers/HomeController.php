<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Course;
use App\Models\Social;
use App\Models\Company;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Models\Certification;

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
        return view('home', compact('posts'));
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
        $experiences = Experience::orderBy("ended_at", 'DESC')->orderby('started_at', 'DESC')->get();
        return view('timeline', compact('experiences'));
    }

}
