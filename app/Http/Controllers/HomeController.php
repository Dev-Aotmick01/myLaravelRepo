<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts= Post::with("comments","user")->paginate(10);
        return view('home', compact("posts"));

//        $user=new User;
//        $user->name="Mohammad";
//        $user->lastname="AOT";
//        $user->email="aot@gmail.com";
//        $user->password="1234";
//        $user->save();
//        return "SAVED";

//        $posts= Post::with("comments","user")->get();
//        return view('admin/posts/posts_index',compact("posts"));
    }

//    public function post(Request $request,$slug)
    public function post(Request $request, Post $post)
    {
//        $post= Post::with("comments","user")->whereSlug($slug)->firstOrFail();
//        $post= Post::find($post);
        return view('post', compact("post"));
    }
    public function about(Request $request)
    {
        return view('about');
    }
    public function contact(Request $request, Post $post)
    {
        return view('contact');
    }
}
