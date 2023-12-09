<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Certification;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Tags\Tag;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $certifications = Certification::orderBy('issued_at', 'desc')->paginate(10);

        return view('certification.index', compact('certifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $companies = Company::pluck('name', 'id');
        $tags = Tag::all();

        return view('certification.create', compact('companies', 'tags'));
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
            'short' => [
                'string',
                'nullable',
            ],
            'identifier' => [
                'string',
                'nullable',
            ],
            'issued_at' => [
                'date',
                'required',
            ],
            'expiration_at' => [
                'date',
                'nullable',
            ],
            'company_id' => [
                'required',
                'integer',
            ],
            'file' => [
                'mimes:pdf',
                'max:2048',
                'nullable',
            ],
        ]);
        if ($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $validatedData['file_path'] = $filePath;
        }
        $certification = Certification::create($validatedData);
        $certification->attachTags($request->tags);
        session()->flash('flash.banner', 'Created Certification!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('certifications.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Certification $certification): View
    {
        return view('certification.show', compact('certification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Certification $certification): View
    {
        $companies = Company::all();
        $tags = Tag::all();

        return view('certification.edit', compact('certification', 'companies', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certification $certification): RedirectResponse
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
            'identifier' => [
                'string',
                'nullable',
            ],
            'issued_at' => [
                'date',
                'required',
            ],
            'expiration_at' => [
                'date',
                'nullable',
            ],
            'company_id' => [
                'required',
                'integer',
            ],
            'file' => [
                'mimes:pdf',
                'max:2048',
                'nullable',
            ],
        ]);
        if ($request->file()) {
            Storage::disk('public')->delete($certification->file_path); // Delete the old file
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $validatedData['file_path'] = $filePath;
        }
        $certification->update($validatedData);
        $certification->syncTags($request->tags);
        session()->flash('flash.banner', 'Updated Certification!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('certifications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certification $certification): RedirectResponse
    {
        $certification->delete();
        session()->flash('flash.banner', 'Deleted Certification!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('certifications.index');
    }
}
