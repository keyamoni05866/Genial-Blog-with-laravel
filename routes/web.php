<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\profileController;

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

Auth::routes();


// dashboard starts
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
Route::post('/profile/name/update/{id}', [profileController::class, 'name_update'])->name('profile.name.update');
Route::post('/profile/email/update/{id}', [profileController::class, 'email_update'])->name('profile.email.update');
Route::post('/profile/password/update/{id}', [profileController::class, 'password_update'])->name('profile.password.update');
Route::post('/profile/image/update/{id}', [profileController::class, 'image_update'])->name('profile.image.update');
