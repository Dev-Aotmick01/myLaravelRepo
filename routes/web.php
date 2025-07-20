<?php

//use App\Models\Photo;
//use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

//use Illuminate\Support\Facades\Schema;


Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/create', function () {
    Storage::put("neo_example.txt", "Hello World!");
//    Storage::disk("custom")->put("example.txt", "Hello World!");
//    Storage::put("example.txt", "Hello World!");
//    Storage::put("/images/example.txt", "Hello World!");
//    Storage::createDirectory("Text");
//    Storage::deleteDirectory("Text");
//    Storage::put("example.txt", "Hello World!");
    return back();
})->name("storages.create");

Route::get('/delete', function (Request $request) {
    Storage::delete("example.txt");
    return back();
})->name("storages.delete");

Route::post('/upload', function (Request $request) {

//    Storage::put("new_image", $request->file("image"));

    Storage::copy("new_image/VHGQ0tUHqCIVqKQpQ0HGsNeAJwBnbJqYTOPtL1AQ.jpg", "new_location/new_name.jpg");
    return back();

//    $request->image->store("october");
//    $request->image->store("images");
//    $request->image->move("images", $request->file("image")->getClientOriginalName());
//    $request->image->move("images/", uniqid() . "/" . $request->file("image")->getClientOriginalName());
//    dd($request->image);
//    dd($request->file);
//    dd($request);
//    dd($_FILES);
//    dd("Working");
//    Storage::delete("example.txt");
//    return back();
});










