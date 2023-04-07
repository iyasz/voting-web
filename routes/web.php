<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\kandidatController;
use App\Http\Controllers\admin\studentController;
use App\Http\Controllers\authController;
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

Route::view('/app', 'admin.index');

Route::resource('/admin', adminController::class);

Route::resource('/student', studentController::class);

Route::resource('/kandidat', kandidatController::class);

Route::post('/login', [authController::class, 'login']);
Route::view('/auth/login', 'auth.login');
