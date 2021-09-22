<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Social;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Models\Certification;
use Illuminate\Support\Facades\App;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cv()
    {
        $certifications = Certification::orderBy('issued_at', 'DESC')->get();
        $socials = Social::all();
        $experiences = Experience::orderBy('started_at', 'DESC')->get();
        $courses = Course::count();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.cv', compact('certifications', 'courses', 'socials', 'experiences'));
        return $pdf->stream();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courses()
    {
        $courses = Course::orderBy('issued_at', 'DESC')->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.courses', compact('courses'));
        return $pdf->stream();
    }
}
