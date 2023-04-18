<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::get('/settings', function () {
        return view('auth.settings');
    })->name('settings');
});

Route::get('/', function() {
    if(Auth::check()) {
        return redirect(route('posts.index'));
    }
    else
    {
        
        return redirect(route('login'));
    }
})->name('home');

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect(route('home'));
    } else {
        return view('auth.login');
    }
})->name('login');

Route::get('/logout', function (Request $request) {
    if (Auth::check()) {
        Auth::logout();
        $request->session()->invalidate();
        return redirect(route('login'))->with('message', 'You have been logged out.');
    } else {
        return redirect(route('login'));
    }
})->name('logout');
