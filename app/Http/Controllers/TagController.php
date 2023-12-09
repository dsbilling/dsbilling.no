<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $tags = Tag::orderBy('created_at', 'desc')->paginate(10);

        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => [
                'string',
                'required',
            ],
        ]);
        Tag::create($validatedData);
        session()->flash('flash.banner', 'Created Tag!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag): View
    {
        return view('tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag): View
    {
        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => [
                'string',
                'required',
            ],
        ]);
        $tag->update($validatedData);
        session()->flash('flash.banner', 'Updated Tag!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
        session()->flash('flash.banner', 'Deleted Tag!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('tags.index');
    }
}
