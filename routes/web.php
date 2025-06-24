<?php


use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

//use Illuminate\Routing\Route;

//Route::get('/', function (Request $request) {
////    $request->session();
//    session(['secret' => "123my"]);
////    $value = session('secret');
//
//    return view('welcome');
//})->name("home");

Route::prefix("sessions")
    ->controller(SessionsController::class)
    ->group(function () {
        Route::get('/', "index");
        Route::get('/set', "set");
    });


//Route::controller(SessionsController::class);













