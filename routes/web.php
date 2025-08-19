<?php

use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\CustomRegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Jobs\DeleteUser;
use App\Jobs\TestJob;
use App\Jobs\UpdataUserLastLogin;
use App\Mail\UserTestEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix("admin")->group(function () {

    Route::get('/', function () {
        return view('admin/index');
    })->name("admin.index");

    Route::resources([
        'posts' => PostController::class,
    ]);
//    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
//    Route::get('/posts', function () {
//        return view('admin/posts/posts_index');
//    })->name("admin.posts.index");
});

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/post/{post:slug}', 'post')->name('home.post');
    Route::get('/about', 'about')->name('home.about');
    Route::get('/contact', 'contact')->name('home.contact');
});

Route::controller(CustomLoginController::class)->group(function () {
//    Route::get('/custom-login', 'customShowLoginForm')->name('custom.login');
    Route::view('/custom-login', 'custom-login')->name('custom.login')->middleware('guest');
    Route::post('/custom-login', 'customLogin')->name('custom.login.post');
    Route::post('/custom-logout', 'customLogout')->name('custom.logout');
//    Route::get('/custom-show-link-form', 'customShowLinkForm')->name('custom.link.request');
    Route::view('/custom-show-link-form', 'custom-show-link-form')->name('custom.link.request');
    Route::post('/custom-reset', 'customReset')->name('custom.reset');
    Route::get('/custom-password/reset/{token}', 'customShowResetForm')->name('custom.show.reset');
    Route::post('/custom-password/reset', 'customPasswordUpdate')->name('custom.password.update');
});

Route::controller(CustomRegistrationController::class)->group(function () {
    Route::view('/custom-register', 'custom-register')->name('custom.show.register')->middleware('guest');
    Route::post('/custom-register', 'customRegister')->name('custom.register');
//    Route::get('/custom-register', 'customShowRegister')->name('custom.show.register');
});

//Route::get('/custom-login', fn () => view('custom-login'))->name('custom.login');
//Route::post('/custom-login', [CustomLoginController::class, 'customLogin'])->name('custom.login.post');
//Route::post('/custom-logout', [CustomLoginController::class, 'customLogout'])->name('custom.logout');
//Route::get('/custom-show-link-form', [CustomLoginController::class, 'customShowLinkForm'])->name('custom.link.request');
//Route::post('/custom-reset', [CustomLoginController::class, 'customReset'])->name('custom.reset');

//Route::get('/custom-password/reset/{token}', [CustomLoginController::class, 'customShowResetForm'])
//    ->name('custom.show.reset');
//Route::post('/custom-password/reset', [CustomLoginController::class, 'customPasswordUpdate'])
//    ->name('custom.password.update');

//Route::get('/', function () {
//    return view('HomeScreen/greeting');
//    return view('HomeScreen/greeting')->name('home.greeting');
//})->name('home.greeting');

//Route::get('/admin', function () {
//    return view('admin/index');
//})->name('admin.index');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/post/{post:slug}', [App\Http\Controllers\HomeController::class, 'post'])->name('home.post');
// Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
// Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');

