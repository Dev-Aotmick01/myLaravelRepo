<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Auth;

//use Illuminate\Container\Attributes\Auth;

//use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $posts= Post::with(["comments","user"])->get();

        $posts= Post::all();

//        foreach ($posts as $post) {
//            echo $post->id . "<br>";
//            echo $post->user->name. "<br>";
//            echo $post->title . "<br>";
//            echo $post->comments[0]->id. "<br>";
//            echo $post->created_at->diffForHumans() . "<br>";
//        }

//        foreach ($posts as $post) {
//            echo $post->id . "<br>";
//            echo $post->user->name . " - " . $post->title . "<br>";
//            foreach ($post->comments[0] as $comment) {
//                echo "    " . $comment->body . "<br>";
//            }
//            echo $post->created_at->diffForHumans() . "<br>";
//        }
//        $posts= Post::all();
//        dd(Auth::user()->posts);
        return view('admin/posts/posts_index',compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('update', $post);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
