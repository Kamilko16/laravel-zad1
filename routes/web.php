<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

function logout($request)
{
    Auth::logout();
    $request->session()->invalidate();
}


Route::middleware(['auth'])->group(function () {
    Route::get('/', function (Request $request) {

        if(env('2FA_LOCK', true)) {
            if (Auth::user()->two_factor_secret) {
                return view('home');
            } else {
                logout($request);
                return redirect('/login')->with('message', 'You can\'t log in');
            }
        }
        else
        {
            return view('home'); 
        }

    });

    Route::get('/settings', function () {
        return view('auth.settings');
    });
});

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/');
    } else {
        return view('auth.login');
    }
})->name('login');

Route::get('/logout', function (Request $request) {

    logout($request);
    return redirect('/login')->with('message', 'You have been logged out.');
})->name('logout');
