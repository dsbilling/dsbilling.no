<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Social;
use App\Models\Company;
use App\Models\Experience;
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
        return view('daniel', compact('certifications', 'courses', 'socials', 'experience'));
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

}
