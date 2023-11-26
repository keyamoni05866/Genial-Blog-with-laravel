<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryBlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagBlogController;
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

// frontend start
Route::get('/', [FrontendController::class, 'index'])->name('root');
Route::get('/error', [FrontendController::class, 'error'])->name('error');
Route::get('/root/blog/single/{id}', [FrontendController::class, 'single'])->name('root.single');
Route::get('/root/blogs/', [FrontendController::class, 'blog_index'])->name('root.blogs');
Route::get('/root/contact', [FrontendController::class, 'contact_index'])->name('contact');
Route::post('/contact/post', [FrontendController::class, 'contact_post'])->name('contacts.post');


// category blog controller
Route::get('/root/category/blog/{id}', [CategoryBlogController::class, 'index'])->name('root.category.blog');

// tag related blog controller

Route::get('/root/tag/blog/{id}', [TagBlogController::class, 'index'])->name('root.tag.blog');


// search Controller

Route::get('/search/blogs', [SearchController::class, 'index'])->name('search.blogs');


// Auth::routes(['register' => false]);
Auth::routes(['verify' =>true]);

// for registration off
Route::get('/register', function () {
    return view('frontend.error.error');
});

// route for error



// dashboard starts
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');


// profile update
Route::get('/profile', [profileController::class, 'index'])->middleware('owner')->name('profile.index');
Route::post('/profile/name/update/{id}', [profileController::class, 'name_update'])->middleware('owner')->name('profile.name.update');
Route::post('/profile/email/update/{id}', [profileController::class, 'email_update'])->middleware('owner')->name('profile.email.update');
Route::post('/profile/password/update/{id}', [profileController::class, 'password_update'])->middleware('owner')->name('profile.password.update');
Route::post('/profile/image/update/{id}', [profileController::class, 'image_update'])->middleware('owner')->name('profile.image.update');

// Tag section
Route::get('/tag', [TagController::class, 'index'])->middleware('owner')->name('tag');
Route::post('/tag/insert', [TagController::class, 'insert'])->middleware('owner')->name('tag.insert');
Route::post('/tag/status/{id}', [TagController::class, 'status'])->middleware('owner')->name('tag.status');
Route::post('/tag/update/{id}', [TagController::class, 'update'])->middleware('owner')->name('tag.update');
Route::post('/tag/delete/{id}', [TagController::class, 'delete'])->middleware('owner')->name('tag.delete');


// category section
Route::get('/category', [CategoryController::class, 'index'])->middleware('owner')->name('category');
Route::post('/category/insert', [CategoryController::class, 'insert'])->middleware('owner')->name('category.insert');
Route::post('/category/status/{id}', [CategoryController::class, 'status'])->middleware('owner')->name('category.status');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->middleware('owner')->name('category.update');
Route::post('/category/delete/{id}', [CategoryController::class, 'delete'])->middleware('owner')->name('category.delete');

// Blog Section

Route::get('/blog', [BlogController::class, 'index'])->middleware('owner')->name('blog');
Route::get('/blog/insert/view', [BlogController::class, 'insert_view'])->middleware('owner')->name('blog.insert.view');
Route::post('/blog/insert', [BlogController::class, 'insert'])->middleware('owner')->name('blog.insert');
Route::get('/blog/status/{id}', [BlogController::class, 'status'])->middleware('owner')->name('blog.status');
Route::get('/blog/feature/update/{id}', [BlogController::class, 'feature'])->middleware('owner')->name('blog.feature');
Route::get('/blog/edit/view/{id}', [BlogController::class, 'edit_view'])->middleware('owner')->name('blog.edit.view');
Route::post('/blog/edit/{id}', [BlogController::class, 'edit'])->middleware('owner')->name('blog.edit');
Route::post('/blog/delete/{id}', [BlogController::class, 'delete'])->middleware('owner')->name('blog.delete');
Route::post('/blog/restore/{id}', [BlogController::class, 'restore'])->middleware('owner')->name('blog.restore');
Route::post('/blog/restore/delete/{id}', [BlogController::class, 'restore_delete'])->middleware('owner')->name('blog.restore.delete');


// About the Bloger

Route::get('/about', [AboutController::class, 'index'])->middleware('owner')->name('about');
Route::post('/about/insert', [AboutController::class, 'insert'])->middleware('owner')->name('about.insert');
Route::post('/about/status/{id}', [AboutController::class, 'status'])->middleware('owner')->name('about.status');
Route::get('/about/delete/{id}', [AboutController::class, 'delete'])->middleware('owner')->name('about.delete');
Route::post('/about/update/{id}', [AboutController::class, 'update'])->middleware('owner')->name('about.update');




// email verification
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


