<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateInformationController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'name' => 'string|min:3|max:191|required',
            'email' => 'email|required',
            'username' => 'alpha_num|min:3|max:191|required|unique:users,username,' . auth()->id(),
        ]);

        Auth::user()->update($attr);
        // Auth::user()->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'username' => $request->username,
        // ]);

        // return back()->with('success', 'Profil anda sudah diperbarui');
        return redirect()
            ->route('profile', Auth::user()->username)
            ->with('message', 'Profil anda sudah diperbarui');
    }
}
