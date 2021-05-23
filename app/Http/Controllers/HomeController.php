<?php

namespace App\Http\Controllers;

use App\Models\Course;
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

}
