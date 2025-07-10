<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
