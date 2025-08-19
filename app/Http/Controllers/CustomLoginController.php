<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

class CustomLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function customShowLinkForm(){
        return view('custom-show-link-form');
    }

    public function customPasswordUpdate(Request $request)
    {
        $request->validate([
            'token'=>'required',
            'email'=>'required|email',
            'password'=>"required|confirmed|min:4",
            'password_confirmation'=>"required|min:4",
        ]);

        $status=password::reset($request->only('email','password','password_confirmation','token'),function (User $user,$password){
           $user->forceFill([
               'password'=>Hash::make($password)
           ])->setRememberToken(Str::random(30));
           $user->save();
        });
        if ($status === Password::PASSWORD_RESET){
            return redirect()->route('custom.login')->with(['status' => __($status)]);
        }else{
            return back()->withErrors(['email'=>__($status)]);
        }
    }

    public function customShowResetForm(Request $request, $token){
        $email=$request->query("email");
        return view('custom-password-reset',["token"=>$token,"email"=>$email]);
    }

    public function customReset(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
//            'email'=>'required|email|exists:users,email',
        ]);
        $status=Password::sendResetLink($request->only('email'));
        if($status === Password::RESET_LINK_SENT) {
            return back()->with(['status' => __($status)]);
        } else{
            return back()->withErrors(['email'=>__($status)]);
        }
//        dd($status);
//        return back()->with('status', 'Password reset link sent to your email address.');
//        dd($request);
//        return view('custom-show-link-form');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>"required|min:4",
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->route('posts.index');
        }
        return redirect()->route('custom.login');
    }

    public function customLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('custom.login');
    }
}
