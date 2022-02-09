<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('users.index', [
            // 'users' => User::limit(10)->get(),
            // NOTE membuat halaman memiliki pagination atau page next dan seterusnya
            'users' => User::paginate(16), //NOTE lengkap 
            'users' => User::simplePaginate(16), //NOTE simpel

        ]);
    }
}
