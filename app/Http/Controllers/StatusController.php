<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StatusRequest;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function store(StatusRequest $request)
    {
        // NOTE sudah dilakukan oleh Use.php di Model
        // Auth::user()->statuses()->create([
        //     'body' => $request->body,
        //     'identifier' => Str::random(32),
        // ]);

        // NOTE sudah di pindah di StatusRequest.php
        // Auth::user()->makeStatus($request->body);

        // TODO di persingkat lagi
        // $request->make($request->body);
        $request->make();
        return redirect()->back();
    }
}
