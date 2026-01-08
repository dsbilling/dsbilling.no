<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        seo()->title('Projects - '.config('app.name'));
        $projects = Project::active()->orderByDesc('start_date')->paginate(12);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show($param): View
    {
        $project = Project::where('uuid', $param)
            ->orWhere('slug', $param)
            ->active()
            ->firstOrFail();
        abort_if(! $project, 404);
        views($project)->cooldown(60)->record();

        seo()->title($project->title.' - Projects - '.config('app.name'));
        seo()->description(strip_tags(Str::of(Str::limit($project->content, 150))->markdown()));

        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
