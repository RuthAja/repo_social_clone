<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // NOTE bisa menggubakan AuthLL
        // if (Auth::check()) {
        // NOTE bisa juga menggunakan auth()
        if (auth()->check()) {
            return redirect(route('timeline'));
        }
        return view('welcome');
    }
}
