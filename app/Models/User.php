<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);

    }

    public function postComment(): HasOneThrough
    {
        return $this->throughPosts()->hasComments();
//        return $this->hasOneThrough(Comment::class, Post::class);
//        return $this->through("posts")->has("comments");
//        return $this->hasOneThrough(Comment::class, Post::class, "user_id",
//            "post_id", "id", "id");
    }

    public function throughPosts(): HasManyThrough
    {
        return $this->hasManyThrough(Post::class, Comment::class);
    }
//    public function comment()
//    {
//        return $this->belongsTo(Comment::class);
//    }

    public function postComments(): HasManyThrough
    {
        return $this->hasManyThrough(Comment::class, Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function photo(): MorphTo
    {
        return $this->morphTo(Photo::class, "photoable");
    }

    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class, "photoable");
    }

    public function latestPhoto(): MorphOne
    {
        return $this->morphOne(Photo::class, "photoable")->latestOfMany();
    }

    public function oldestPhoto(): MorphOne
    {
        return $this->morphOne(Photo::class, "photoable")->oldestOfMany();
    }

}
