<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UpdateInformationController;
use App\Http\Controllers\ProfileInformationController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', WelcomeController::class);

Route::middleware('auth')->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::post('status', [StatusController::class, 'store'])->name('status.store');
    Route::get('explore', ExploreUserController::class)->name('users.index');

    // TODO menjadikan profile dalam satu group
    // NOTE prefix adalah URL
    Route::prefix('profile')->group(function () {

        Route::get('edit', [UpdateInformationController::class, 'edit'])->name('profile.edit');
        Route::put('update', [UpdateInformationController::class, 'update'])->name('profile.update');

        // FIXME error not found untuk password ini
        // NOTE ternyata setelah di temukan erronya hanya Route::get {user}/{following} ini berada di atas kode password di bawah ini menjadi error. memang aneh bener
        Route::get('password/edit', [UpdatePasswordController::class, 'edit'])->name('password.edit');
        // FIXME memberikan nama password.update ternyata sudah ada di laravel default jadi tak usah dikasih name password.update
        Route::put('password/edit', [UpdatePasswordController::class, 'update']);

        Route::get('{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
        Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');
        Route::get('{user}', ProfileInformationController::class)->name('profile')->withoutMiddleware('auth');
    });
    // NOTE kode dibawah sudah digantikan dengan kode di atas
    // Route::get('profile/{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
    // Route::post('profile/{user}', [FollowingController::class, 'store'])->name('following.store');
    // // Route::get('profile/{user}/follower', [FollowingController::class, 'follower'])->name('profile.follower');
    // // Route::view('dashboard', 'dashboard')->name('dashboard');
    // Route::get('profile/{user}', ProfileInformationController::class)->name('profile')->withoutMiddleware('auth');
});

// TODO buat lebih simpel
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::view('dashboard', 'dashboard')->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
