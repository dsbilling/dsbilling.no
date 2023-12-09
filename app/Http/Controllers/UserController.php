<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::orderBy('name')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $user->syncRoles($request->get('roles'));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
