<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Certification;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifications = Certification::orderBy('issued_at', 'desc')->paginate(10);
        return view('certification.index', compact('certifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id');
        return view('certification.create', compact('companies'));
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
                'required',
            ],
            'identifier' => [
                'string',
                'nullable'
            ],
            'issued_at' => [
                'date',
                'required',
            ],
            'expiration_at' => [
                'date',
                'nullable'
            ],
            'company_id'    => [
                'required',
                'integer',
            ],
        ]);
        Certification::create($validatedData);
        session()->flash('flash.banner', 'Created Certification!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('certifications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function show(Certification $certification)
    {
        return view('certification.show', compact('certification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function edit(Certification $certification)
    {
        $companies = Company::all();
        return view('certification.edit', compact('certification', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certification $certification)
    {
        $validatedData = $request->validate([
            'name' => [
                'string',
                'required',
            ],
            'short' => [
                'string',
                'required',
            ],
            'identifier' => [
                'string',
                'nullable'
            ],
            'issued_at' => [
                'date',
                'required',
            ],
            'expiration_at' => [
                'date',
                'nullable'
            ],
            'company_id'    => [
                'required',
                'integer',
            ],
        ]);
        $certification->update($validatedData);
        session()->flash('flash.banner', 'Updated Certification!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('certifications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certification $certification)
    {
        $certification->delete();
        session()->flash('flash.banner', 'Deleted Certification!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('certifications.index');
    }
}
