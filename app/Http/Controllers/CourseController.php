<?php

namespace App\Http\Controllers;

use Spatie\Tags\Tag;
use App\Models\Course;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('issued_at', 'desc')->paginate(10);
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id');
        $tags = Tag::all();
        return view('course.create', compact('companies', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'string',
                'required',
            ],
            'short' => [
                'string',
                'nullable',
            ],
            'type' => [
                'string',
                'required'
            ],
            'issued_at' => [
                'date',
                'required',
            ],
            'company_id' => [
                'required',
                'integer',
            ],
            'file' => [
                'mimes:pdf',
                'max:2048',
                'nullable'
            ],
        ]);
        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $validatedData["file_path"] = $filePath;
        }
        $course = Course::create($validatedData);
        $course->attachTags($request->tags);
        session()->flash('flash.banner', 'Created Course!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $companies = Company::all();
        $tags = Tag::all();
        return view('course.edit', compact('course', 'companies', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => [
                'string',
                'required',
            ],
            'short' => [
                'string',
                'nullable',
            ],
            'type' => [
                'string',
                'required'
            ],
            'issued_at' => [
                'date',
                'required',
            ],
            'company_id' => [
                'required',
                'integer',
            ],
            'file' => [
                'mimes:pdf',
                'max:2048',
                'nullable'
            ],
        ]);
        if($request->file()) {
            Storage::disk('public')->delete($course->file_path); // Delete the old file
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $validatedData["file_path"] = $filePath;
        }
        $course->update($validatedData);
        $course->syncTags($request->tags);
        session()->flash('flash.banner', 'Updated Course!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        session()->flash('flash.banner', 'Deleted Course!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('courses.index');
    }
}
