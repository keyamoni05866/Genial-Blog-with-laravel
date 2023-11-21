<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
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


// category section
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category/insert', [CategoryController::class, 'insert'])->name('category.insert');
Route::post('/category/status/{id}', [CategoryController::class, 'status'])->name('category.status');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::post('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

// Blog Section

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/insert/view', [BlogController::class, 'insert_view'])->name('blog.insert.view');
Route::post('/blog/insert', [BlogController::class, 'insert'])->name('blog.insert');
Route::get('/blog/status/{id}', [BlogController::class, 'status'])->name('blog.status');
Route::get('/blog/feature/update/{id}', [BlogController::class, 'feature'])->name('blog.feature');
Route::get('/blog/edit/view/{id}', [BlogController::class, 'edit_view'])->name('blog.edit.view');
Route::post('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
Route::post('/blog/restore/{id}', [BlogController::class, 'restore'])->name('blog.restore');
Route::post('/blog/restore/delete/{id}', [BlogController::class, 'restore_delete'])->name('blog.restore.delete');


// About the Bloger

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::post('/about/insert', [AboutController::class, 'insert'])->name('about.insert');
Route::post('/about/status/{id}', [AboutController::class, 'status'])->name('about.status');
Route::get('/about/delete/{id}', [AboutController::class, 'delete'])->name('about.delete');


