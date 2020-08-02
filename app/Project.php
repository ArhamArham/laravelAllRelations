<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded=[];
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function tasks()
    {
        return $this->hasManyThrough(Task::class,Team::class,'project_id','user_id','id','user_id');
    }
    public function task()
    {
        return $this->hasOneThrough(Task::class,Team::class,'project_id','user_id','id','user_id');
    }
}
