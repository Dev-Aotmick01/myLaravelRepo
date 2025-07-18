<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;

//    protected $fillable = ["title", "body"];

    protected $guarded = [];

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
    public function comments()
    {
        // one to many relationship
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        // belongs to relationship / many to one relationship
        return $this->belongsTo(User::class);
    }

    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, "photoable");
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, "taggable")
            ->as("middle")->withTimestamps();
//        return $this->morphToMany(Tag::class, "taggable")
//            ->withTimestamps()->withPivot("status");
    }
}
