<?php

namespace App\Http\Controllers;


//use Illuminate\Support\Facades\Request;
//use http\Env\Request;
//use http\Client\Request;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function index(Request $request)
    {
//        return $request->session()->get("name");
//        return $request->session()->only(["name"]);
        return session()->all();
    }

//    public function set(Request $request, $key, $value)
//    {
////        session([$key => $value]);
////        return "Session key '{$key}' set to '{$value}'";
//        return session([$key => $value]);
//    }
    public function set(Request $request)
    {
        $query = $request->query();
//        session($query);
        $request->session()->put($query);
        return "Session set";
    }
}
