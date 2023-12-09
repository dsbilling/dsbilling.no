<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('company.create');
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
        Company::create($validatedData);
        session()->flash('flash.banner', 'Created Company!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company): View
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company): View
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => [
                'string',
                'required',
            ],
        ]);
        $company->update($validatedData);
        session()->flash('flash.banner', 'Updated Company!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Company $company): RedirectResponse
    {
        $company->delete();
        session()->flash('flash.banner', 'Deleted Company!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('companies.index');
    }
}
