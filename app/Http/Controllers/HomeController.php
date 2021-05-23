<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Company;
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
        return view('daniel', compact('certifications', 'courses'));
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
        return view('dashboard', compact('certifications', 'courses', 'companies'));
    }

}
