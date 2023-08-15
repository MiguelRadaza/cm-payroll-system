<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayoutController;
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
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employee');
        Route::post('/create-employee', [EmployeeController::class, 'createEmployee'])->name('employee.create');
        Route::get('/payout/{id}', [EmployeeController::class, 'sendPayoutPage'])->name('employee.create-page');
        Route::post('/payout/', [EmployeeController::class, 'sendPayout'])->name('employee.payout-create');
    });
    
    Route::get('/register', function () {
        return view('auth.register');
    });
    
    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::prefix('payout')->group(function () {
        Route::get('/', [PayoutController::class, 'index'])->name('payouts');
    });
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
