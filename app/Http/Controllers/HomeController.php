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
        $certifications = Certification::count();
        $courses = Course::count();
        $socials = Social::all();
        $experience = Experience::orderBy('started_at', 'ASC')->pluck('started_at')->first();
        $posts = Post::where('published_at', '<=', now())->where('draft', false)->orderByDesc('published_at')->take(3)->get();
        return view('home', compact('certifications', 'courses', 'socials', 'experience', 'posts'));
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
    public function liter()
    {
        $volume = NULL;
        $totalprice = NULL;
        return view('tools.liter-calculator', compact('volume', 'totalprice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function literCalculate(Request $request, Course $course)
    {
        $request->validate([
            'bredde' => [
                'numeric',
                'required',
            ],
            'lengde' => [
                'numeric',
                'nullable',
            ],
            'tykkelse' => [
                'numeric',
                'required'
            ],
            'pris' => [
                'numeric',
                'required',
            ],
        ]);

        $liters = ($request->bredde * $request->lengde * $request->tykkelse) / 1000;
        $totalprice = ($liters * $request->pris);
        $request->flash();
        return view('tools.liter-calculator', compact('liters', 'totalprice'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function timeline()
    {
        $experiences = Experience::orderByRaw("-ended_at", 'DESC')->orderby('started_at', 'DESC')->get();
        return view('timeline', compact('experiences'));
    }

}
