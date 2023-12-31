<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\PayoutTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyInvitationController;
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
    return view('auth.login');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::get('/dashboard-v2', [HomeController::class, 'dashboardPage'])->name('dashboardV2');

    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employee');
        Route::post('/update-employee', [EmployeeController::class, 'updateEmployee'])->name('employee.update');
        Route::get('/activate/{id}', [EmployeeController::class, 'activateEmployee'])->name('employee.activate');
        Route::get('/delete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete');
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

    Route::prefix('payout-type')->group(function () {
        Route::get('/', [PayoutTypeController::class, 'index'])->name('payout-type');
    });

    Route::prefix('payout')->group(function () {
        Route::get('/payslip/delete/{id}', [PayoutController::class, 'deletePayout'])->name('payouts.payslip-delete');
        Route::get('/', [PayoutController::class, 'index'])->name('payouts');
        Route::get('/payslip/{id}', [PayoutController::class, 'payslipPage'])->name('payouts.payslip');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'getUserProfile'])->name('user.profile');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/company-invitation', [CompanyInvitationController::class, 'createPage'])->name('admin.create-invitation-page');
        Route::post('/company-invitation', [CompanyInvitationController::class, 'createInvitation'])->name('admin.create-invitation');
        Route::get('/company-invitation-deleted/{id}', [CompanyInvitationController::class, 'deleteInvitation'])->name('admin.delete-invitation');
    });

});

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
