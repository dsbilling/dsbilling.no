<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\WantAccess;
use Illuminate\Support\Facades\Notification;

class AccessController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function wantAccess()
    {
        $user = User::where('email', env('PRIVATE_EMAIL'))->first();
        Notification::send($user, new WantAccess(auth()->user()));
        session()->flash('flash.banner', 'Notification sent!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('dashboard');
    }

}
