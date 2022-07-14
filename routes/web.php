<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect()->intended('/')->withSuccess('Signed in');
    }
});

Route::get('/register', function () {
    return view('customer/register');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
