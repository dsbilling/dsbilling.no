<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Experience;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::orderBy('started_at', 'desc')->paginate(10);

        return view('experience.index', compact('experiences'));
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

        return view('experience.create', compact('companies', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => [
                'string',
                'required',
            ],
            'department' => [
                'string',
                'nullable',
            ],
            'type' => [
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'started_at' => [
                'date',
                'required',
            ],
            'ended_at' => [
                'date',
                'nullable',
            ],
            'company_id' => [
                'required',
                'integer',
            ],
        ]);
        $experience = Experience::create($validatedData);
        $experience->attachTags($request->tags);
        session()->flash('flash.banner', 'Created Experience!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('experiences.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return view('experience.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        $companies = Company::all();
        $tags = Tag::all();

        return view('experience.edit', compact('experience', 'companies', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $validatedData = $request->validate([
            'title' => [
                'string',
                'required',
            ],
            'department' => [
                'string',
                'nullable',
            ],
            'type' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'started_at' => [
                'date',
                'required',
            ],
            'ended_at' => [
                'date',
                'nullable',
            ],
            'company_id' => [
                'required',
                'integer',
            ],
        ]);
        $experience->update($validatedData);
        $experience->syncTags($request->tags);
        session()->flash('flash.banner', 'Updated Experience!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('experiences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        session()->flash('flash.banner', 'Deleted Experience!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('experiences.index');
    }
}
