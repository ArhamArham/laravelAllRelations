<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(\App\User::class)->withDefault([
            'name'=>'Guest User'
        ]);
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
    public function comment()
    {
        return $this->morphOne(Comment::class,'commentable');
    }
}
