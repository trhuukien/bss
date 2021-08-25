<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    return redirect(route('dashboard'));
});

Route::get('login', [HomeController::class, 'login'])->name('login');
Route::post('login', [HomeController::class, 'postLogin']);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('dashboard', [DashboardController::class, 'add'])->middleware('auth');
Route::get('dashboard/delete/{id}', [DashboardController::class, 'delete'])->name('dashboard.delete')->middleware('auth');

Route::get('log', [LogController::class, 'index'])->name('log')->middleware('auth');
Route::get('log/add', [LogController::class, 'add'])->name('log.add')->middleware('auth');
Route::post('log/add', [LogController::class, 'postAdd'])->middleware('auth');
Route::get('log/delete/{id}', [LogController::class, 'delete'])->name('log.delete')->middleware('auth');

Route::get('setting', [HomeController::class, 'setting'])->name('setting')->middleware('auth');
Route::post('setting', [HomeController::class, 'postSetting'])->name('setting')->middleware('auth');

Route::get('logout', function () {
    Auth::logout();
    return redirect((route('login')));
})->name('logout');
