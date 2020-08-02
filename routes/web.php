<?php

use App\Post;
use App\Project;
use App\Tag;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('user', function () {
    // $users=User::whereHas('posts',function ($query){
    //     $query->where('title','like','%title%');
    // })->with('posts')->get();
    $users=User::doesntHave('posts')->with('posts')->get();
    // $users[0]->posts()->create([
    //     'title'=>'post 3'
    // ]);
    // $users[2]->posts()->create([
    //     'title'=>'post 4'
    // ]);
    return view('users.index',compact('users'));
});

Route::get('posts', function () {
    \App\Tag::create([
        'name'=>'Vuejs'
    ]);
    // $tag=Tag::first();
    $post=Post::first();
    $post->tags()->sync([
        4=>[
        'status'=>'approved'
    ]]);
    // dd($post->tags->first()->pivot->status  );
    $posts=\App\Post::with(['user','tags'])->get();
    return view('posts.index',compact('posts'));
});
Route::get('tags', function () {
    $tags=\App\Tag::with('posts')->get();
    return view('tags.index',compact('tags'));
});
Route::get('projects', function () {
    $project=Project::create([
        'title'=>'Project B'
    ]);
    $user1=User::create([
        'name'=>'User3',
        'email'=>'user3@gmail.com',
        'password'=>Hash::make('password'),
        'project_id'=>$project->id
    ]);
    $user2=User::create([
        'name'=>'User4',
        'email'=>'user4@gmail.com',
        'password'=>Hash::make('password'),
        'project_id'=>$project->id  
    ]);
    $user5=User::create([
        'name'=>'User5',
        'email'=>'user5@gmail.com',
        'password'=>Hash::make('password'),
        'project_id'=>$project->id  
    ]);
    $task1=Task::create([
        'title'=>'Task 4 for project 2 by user 3',
        'user_id'=>$user1->id
    ]);
    $task2=Task::create([
        'title'=>'Task 5 for project 2 by user 4',
        'user_id'=>$user2->id
    ]);
    $task3=Task::create([
        'title'=>'Task 5 for project 2 by user 5',
        'user_id'=>$user5->id
    ]);
});
Route::get('project', function () {
    $project=Project::find(6);
    // return $project->task;
    dd($project->tasks);
});