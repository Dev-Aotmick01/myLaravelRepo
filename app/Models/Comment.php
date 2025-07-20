<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $touches = ['post'];

//    public function user()
//    {
//        return $this->hasOne(User::class);
//    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, "taggable");
    }
}
