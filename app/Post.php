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
    public function memos() {
        return $this->hasMany('App\Memo');
    }
  
    //
}
