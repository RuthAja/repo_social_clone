<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        return view('password.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            // FIXME kode dibawah error karena saat berhasil update password password masih berupa plain text atau text belum di bcrypt
            // auth()->user()->update($request->only('password'));
            // TODO lakukan bcrypt password ketika update password baru
            // auth()->user()->update(['password' => Hash::make($request->password)]);
            auth()->user()->update(['password' => bcrypt($request->password)]);
            return back()->with('message', 'Password telah diperbarui');
        }
        throw ValidationException::withMessages([
            'current_password' => ['Password lama anda tidak sesuai dengan data kami bujank'],
        ]);
    }
}
