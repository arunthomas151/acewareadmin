<?php

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


Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::get('/userreg', [App\Http\Controllers\AdminController::class, 'userreg'])->name('userreg');
Route::get('/userslist', [App\Http\Controllers\AdminController::class, 'userslist'])->name('userslist');

Route::post('/registarion', [App\Http\Controllers\AdminController::class, 'registarion'])->name('registarion');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
