<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Photo extends Model
{
    use HasFactory;

//    protected $guarded = [];

    public function photoable(): MorphTo
    {
        return $this->morphTo();
//        return $this->morphTo(__FUNCTION__,"photoable_type","photoable_id");
//        return $this->morphTo(__FUNCTION__,"owner_type","owner_id");
    }


}
