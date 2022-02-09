<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{

    public function index(User $user, $following)
    {

        // TODO persingkat if else
        // if ($following == 'following') {
        //     $follows = $user->follows;
        // }
        // if ($following == 'follower') {
        //     $follows = $user->followers;
        // }
        $follows = $following == 'following' ? $user->follows : $user->followers;

        if ($following !== 'follower' && $following !== 'following') {
            return redirect(route('profile', $user->username));
        }

        return view('users.following', [
            'user' => $user,
            'follows' => $follows,
        ]);
    }

    public function store(Request $request, User $user)
    {
        // TODO buat lebih simpel
        // if (Auth::user()->hasFollow($user)) {
        //     Auth::user()->unfollow($user);
        // } else {
        //     Auth::user()->follow($user);
        // }
        // NOTE kode dibawah ini sama seperti di atas
        Auth::user()->hasFollow($user) ? Auth::user()->unfollow($user) : Auth::user()->follow($user);

        // dd($user);
        return back()->with('success', 'Berhasil mengikuti ' . $user->username);
    }

    // public function following(User $user)
    // {
    //     // dd($user->follows);
    //     return view('users.following', [
    //         'following' => $user->follows,
    //         'user' => $user,
    //     ]);
    // }

    // public function follower(User $user)
    // {
    //     return view('users.following', [
    //         'following' => $user->followers,
    //         'user' => $user,
    //     ]);
    // }
}
