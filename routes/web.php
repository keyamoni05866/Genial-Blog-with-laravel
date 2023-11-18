<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\TagController;

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


// profile update
Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
Route::post('/profile/name/update/{id}', [profileController::class, 'name_update'])->name('profile.name.update');
Route::post('/profile/email/update/{id}', [profileController::class, 'email_update'])->name('profile.email.update');
Route::post('/profile/password/update/{id}', [profileController::class, 'password_update'])->name('profile.password.update');
Route::post('/profile/image/update/{id}', [profileController::class, 'image_update'])->name('profile.image.update');

// Tag section
Route::get('/tag', [TagController::class, 'index'])->name('tag');
Route::post('/tag/insert', [TagController::class, 'insert'])->name('tag.insert');
Route::post('/tag/status/{id}', [TagController::class, 'status'])->name('tag.status');
Route::post('/tag/update/{id}', [TagController::class, 'update'])->name('tag.update');
Route::post('/tag/delete/{id}', [TagController::class, 'delete'])->name('tag.delete');
