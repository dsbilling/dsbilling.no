<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Company;
use App\Models\Experience;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $experiences = Experience::orderBy('started_at', 'desc')->paginate(10);

        return view('experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $companies = Company::pluck('name', 'id');
        $tags = Tag::all();

        return view('experience.create', compact('companies', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
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
     */
    public function show(Experience $experience): View
    {
        return view('experience.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience): View
    {
        $companies = Company::all();
        $tags = Tag::all();

        return view('experience.edit', compact('experience', 'companies', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience): RedirectResponse
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
     */
    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();
        session()->flash('flash.banner', 'Deleted Experience!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('experiences.index');
    }
}
