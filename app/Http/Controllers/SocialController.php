<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::orderBy('created_at', 'desc')->paginate(10);
        return view('social.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('social.create');
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
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        return view('social.show', compact('social'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        return view('social.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
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
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        $social->delete();
        session()->flash('flash.banner', 'Deleted Social!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('socials.index');
    }
}
