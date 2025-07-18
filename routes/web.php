<?php

//use App\Models\Photo;
//use App\Models\Post;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use Illuminate\Support\Facades\Schema;


Route::get('/', function (Request $request) {

    $post = Post::find(1);
    $tag = new Tag;
    $tag->name = "PHP";
//    $post->tags()->save($tag);

//    echo $post->tags[0]->pivot->status;
    echo $post->tags[0]->middle->created_at;
//    echo $post->tags[0]->pivot->created_at;
//    dd($post->tags[0]->pivot->created_at);
//    dd($post->tags[0]->pivot);
//    dd($post->tags[0]);
//    dd($post->tags);


//    Tag::find(3)->comments->each(function ($comment) {
//        dd($comment->message);
//        return $comment->message;
//    });
//    dd(Tag::find(1)->comments[0]);
//    dd(Tag::find(1)->comments);
//    dd(Tag::find(1)->posts);
//    $comment = Comment::find(1);
//    $tag->name = "Laravel";
//    $comment->tags()->save($tag);


//    $user = User::find(3);
//    dd($user->oldestPhoto);
//    dd($user->latestPhoto);
//    dd($user->latestPhoto());
//    dd($user);
//    dd($user->photos->each(function ($photo) {
//        dd($photo);
//    }));
//    dd($user->photos->each(function ($photo) {
//        dd($photo->path);
//    }));
//    dd($user->photos->each(function ($photo) {
//        dd($photo);
//    }));
//    dd($user->photos);
//    dd($user->photo()->get());


//    $user = User::find(1);
//    $post = Post::find(1);
//    $photo = Photo::find(1);
//    dd($photo->photoable);
//    dd($photo->photoable->title);
//    dd($photo->photoable());

//    $photo = new Photo(["path" => fake()->imageUrl("100", "50")]);
//    $user->photo()->delete();
//    $user->photo()->save($photo);
//    $post->photo()->save($photo);
//    $post->photo()->save($photo);

//    dd($user->photo()->update(["path" => fake()->imageUrl("100", "50")]));
//    dd($user->photo()->update(["path" => "new path"]));
//    return "Photo Saved Successfully...Man!!";

//    $comment = new Comment(["message" => "New Comment"]);
//    dd(Post::find(1)->comments()->save($comment));
//    $user = User::find(1);
//    $user->roles()->updateExistingPivot(3, ["user_id" => 6]);


//    Role::destroy([6, 7]);
//    $user = User::find(1);
//    $user->roles()->toggle([5, 3, 5]);
//    $user->roles()->toggle([5 => ["created_at" => now()]]);
//    $user->roles()->toggle(1);
//    $user->roles()->create(["name" => "Student"]);
//    $role = new Role(["name" => "Teacher"]);
//    $user->roles()->save($role);
//    $user->roles()->updateExistingPivot(1);
//    $user->roles()->attach(1);
//    $user->roles()->detach(1);
//    $user->roles()->syncWithoutDetaching([1,2,4]);
//    $user->roles()->sync(1);


//    $comment = ["message" => "Crazy! " . fake()->sentence];
//    dd(User::find(1)->postComments()->delete($comment));
//    dd(User::find(1)->postComments);
//    User::find(1)->postComments()->update($comment);


//    $post = ["message" => "NEW Comment - Hey"];
//    $post = ["message" => "Crazy! " . fake()->sentence];
//    $post = ["message" =>  fake()->sentence];
//    User::find(1)->postComments()->update($post);
//    User::find(1)->postComments()->create($post);

//    dd(User::find(1)->postComments);
//    dd(User::find(1));

//    $userData = User::find(1)->postComment[0]->post->user->posts->each(function ($post) {
//        return $post->id === 1 ? $post->delete() : $post->refresh();
//    });
//    dd($userData);
//    $userData = User::find(1)->postComment[0]->post->user->posts->each(function ($post) {
//        return $post->id === 1 ? $post->delete() : $post->refresh();
//        dd($post);
//        echo $post->title . "<br>";
//    });
//    dd($userData);
//    dd(User::find(1)->postComment[0]->post->user);
//    dd(User::find(1)->postComment[0]->post->user->name);
//    dd(User::find(1)->postComment[0]->post);
//    dd(User::find(3)->postComment->message);
//    dd(User::find(3)->postComment);
//
//
//    $comment = User::find(3)->postComment()->latest()->first();
//    $comment->message = "You are a new comment message.";
//    $comment->save();
//    dd(User::find(3)->postComment()->latest()->first());
//    dd(User::find(3)->postComment()->latest());
//    $comment = ["post_id" => 51, "message" => "UPorCREATE - Hey, NEW Man - Neo Comment => This is a new comment message."];
//    dd(User::find(3)->postComment()->updateOrCreate($comment));
//    dd(User::find(3)->postComment()->create($comment));


//    $comment = ["message" => "Man - This is a new comment message."];
//    dd(User::find(3)->postComment()->get()->where("id", 5)
//        ->first()->update($comment));
//    dd(User::find(3)->postComment()->get()->where("id", 17)->first()->delete());
//    dd(User::find(3)->postComment()->get()->where("id", 3)->first()->message);
//    dd(User::find(3)->postComment()->orderBy("id", "desc")->first()->message);
//    User::find(3)->postComment()->update($comment);

//    dd(User::find(1)->postComment->message);
//    dd(User::find(1)->postComment[0]->message);
//    dd(User::find(1)->postComment);


//    dd(Post::find(13)->user()->delete());
//    $post = Post::find(1);
//    $post->title = "Updated Post-1 Title";
//    $post->comments[0]->message = "Updated Comment-1 Message";
//    $post->user->name = "Updated User-1 Name";
//    $post->push();
//    dd($post->comments);
//    dd($post->comments->count());
//    $post = Comment::find(1)->post;
//    $post->title = "Updated Post Title";
//    $post->body = "Updated Post Body";
//    $post->save();
//    dd(Comment::find(1)->post->title);


//    $comment = Comment::find(5);
//    $post = Post::find(11);
//    $comment->post()->associate($post);
//    $comment->save();
//    Post::find(9)->post()->associate(Comment::find(3))->save();
//    Comment::find(6)->post()->associate(Post::find(9))->save();
//    dd(Comment::find(1)->post()->associate(Post::find(1))->save());
//    dd(User::find(13)->posts()->whereId(16)->delete());
//    dd(User::find(1)->posts()->where("id", "=", 12)->delete());
//    dd(User::find(1)->posts()->where("id", 10)->delete());
//    dd(User::find(1)->posts()->delete());
//    dd(User::find(1)->posts()->get());


//    $post1 = new Post([
//        "title" => "New p1 Post Title",
//        "body" => "This is the body of the new p1 post."
//    ]);
//    $post2 = new Post([
//        "title" => "New p2 Post Title",
//        "body" => "This is the body of the new p2 post."
//    ]);
//    User::find(11)->posts()->create(["title" => "New p3 Post Title",
//        "body" => "This is the body of the new p3 post."]);

//    User::find(11)->posts()->createMany([
//        [
//            "title" => "First1 Post Title",
//            "body" => "This is the body of the first post.",
//        ],
//        [
//            "title" => "Second1 Post Title",
//            "body" => "This is the body of the second post.",
//        ]
//    ]);
//    User::find(11)->posts()->saveMany([$post1, $post2]);
//    return response(200);


//    dd(Post::find(1)->user);
//    dd(User::find(1)->posts);
//    $user = [
//        "name" => "Aotz  Hassan",
//        "email" => "ar1@gmail.com",
//        "password" => "123newpd"
//    ];
//    $newUser = new User($user);
//    $comment = Comment::find(1)->user()->delete();
//    $comment = Comment::find(5)->user()->update($user);
//    $comment = Comment::find(1)->user()->update($user);
//    $comment = Comment::find(1)->user()->save($newUser);


//    Schema::disableForeignKeyConstraints();
//
//    User::truncate();
//    Post::truncate();
//    Comment::truncate();


    // has one
//    dd(Comment::find(1)->user->name);
//    dd(Comment::find(1)->user);
//    dd(Comment::find(1));
//
//    // belongs to/ has one inverse
//    dd(User::find(1)->comment->message);
//    dd(User::find(1)->comment);
//
//
//  return view('welcome');
//  return "Truncate Done...!!";
//    return "New1 Create Post Saving Done...man!!";
//    return "Something Happening Done...man!!";
//    return "Role Deleting Done...man!!";
//    return "Creating Done...man!!";
//    return "Deleted Done...man!!";
//    return "Tag Saving Done...man!!";
//    return "Photo Saving Done...man!!";
})->name("home");










