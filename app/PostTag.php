<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    protected $table='post_tag';

    public static function boot(){
        parent::boot();
        static::created(function($item){
            dd('created',$item);
        });
        static::deleted(function($item){
            dd('deleted',$item);
        });
    }
}
