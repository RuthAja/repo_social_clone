<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileInformationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
        // NOTE alternativ 1
        return view('users.show', [
            'user' => $user,
            'statuses' => $user->statuses()->latest()->get(),
        ]);
        // NOTE alternativ 2
        // return view('users.show', compact('user'));
    }
}
