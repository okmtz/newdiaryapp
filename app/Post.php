<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'content_id',
        'title',
        'content',
    ];
  
    //
}
