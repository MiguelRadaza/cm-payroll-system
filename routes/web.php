<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    
    Route::get('/register', function () {
        return view('auth.register');
    });
    
    Route::get('/login', function () {
        return view('auth.login');
    });
    
    Route::get('/employees', function () {
        return view('pages.employee');
    })->name('employee');
    
    Route::get('/payouts', function () {
        return view('pages.payouts');
    })->name('payouts');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
