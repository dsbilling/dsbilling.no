<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $socials = Social::orderBy('created_at', 'desc')->paginate(10);

        return view('social.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => [
                'string',
                'required',
            ],
            'icon' => [
                'string',
                'required',
            ],
            'link' => [
                'url',
                'required',
            ],
        ]);
        Social::create($validatedData);
        session()->flash('flash.banner', 'Created Social!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('socials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social): View
    {
        return view('social.show', compact('social'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social): View
    {
        return view('social.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => [
                'string',
                'required',
            ],
            'icon' => [
                'string',
                'required',
            ],
            'link' => [
                'url',
                'required',
            ],
        ]);
        $social->update($validatedData);
        session()->flash('flash.banner', 'Updated Social!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('socials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Social $social): RedirectResponse
    {
        $social->delete();
        session()->flash('flash.banner', 'Deleted Social!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('socials.index');
    }
}
