<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['user_id', 'name', 'created_at'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    //
}
