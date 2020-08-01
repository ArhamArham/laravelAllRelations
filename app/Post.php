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
        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id');
    }
}
