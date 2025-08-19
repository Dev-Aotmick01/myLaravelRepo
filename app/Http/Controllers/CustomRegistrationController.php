<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function customRegister(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:4|confirmed',
            'password_confirmation'=>'required|min:4',
        ]);

        $input=$request->only("firstname","lastname","email","password","password_confirmation");

        $user=User::create($input);

        Auth::login($user);

        return redirect()->route('posts.index');

//        dd($request->only("firstname","lastname","email","password","password_confirmation"));
//        dd($request->only("email"));
//        dd($request);
//        return view('custom-register');
    }

//    public function customShowRegister(){
//        return view('custom-register');
//    }
}
