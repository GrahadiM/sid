<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => false,
    'confirm'  => false,
    'verify'   => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('admin/')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('announcement', App\Http\Controllers\Admin\AnnouncementController::class);
    Route::resource('messages', App\Http\Controllers\Admin\MessageController::class);
    // Route::resource('histories', App\Http\Controllers\Admin\HistoryController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});

Route::middleware(['auth'])->prefix('staff/')->name('staff.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Staff\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('announcement', App\Http\Controllers\Staff\AnnouncementController::class);
    Route::resource('messages', App\Http\Controllers\Staff\MessageController::class);
    // Route::resource('histories', App\Http\Controllers\Staff\HistoryController::class);
    Route::resource('users', App\Http\Controllers\Staff\UserController::class);
});

Route::middleware(['auth'])->prefix('user/')->name('user.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('messages', App\Http\Controllers\User\MessageController::class);
    Route::resource('histories', App\Http\Controllers\User\HistoryController::class);
});
