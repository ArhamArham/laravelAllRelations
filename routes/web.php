<?php

use App\Comment;
use App\Post;
use App\Project;
use App\Tag;
use App\Task;
use App\User;
use App\Video;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // $user=User::create([
    //     'name'=>'Arham',
    //     'email'=>'arham@gmail.com',
    //     'password'=>Hash::make('password')
    // ]);
    // $post=Post::create([
    //     'user_id'=>$user->id,
    //     'title'=>'example post title'
    // ]);
    // $post->comments()->create([
    //     'user_id'=>$user->id,
    //     'body'=>'comment for post'
    // ]);
    $post=Post::find(1);
    // $post->comments()->create([
    //     'user_id'=>2,
    //     'body'=>'2nd comment for post'
    // ]);
    dd($post->comment);
    // $video=Video::create([
    //     'title'=>'example video title'
    // ]);
    // $video->comments()->create([
    //     'user_id'=>$video->id,
    //     'body'=>'comment for video'
    // // ]);
    // $video=Video::find(1);
    // dd($video->comments);
    // $comment=Comment::find(3);
    // dd($comment->subject);
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
    $project1=Project::create([
        'title'=>'Project A'
    ]);
    $project2=Project::create([
        'title'=>'Project B'
    ]);
    $user1=User::create([
        'name'=>'User A',
        'email'=>'usera@gmail.com',
        'password'=>Hash::make('password')
    ]);
    $user2=User::create([
        'name'=>'User B',
        'email'=>'userb@gmail.com',
        'password'=>Hash::make('password')  
    ]);
    $user3=User::create([
        'name'=>'User C',
        'email'=>'userc@gmail.com',
        'password'=>Hash::make('password')  
    ]);
    $project1->users()->attach($user1);
    $project1->users()->attach($user2);
    $project1->users()->attach($user3);

    $project2->users()->attach($user1);
    $project2->users()->attach($user3);
});
Route::get('project', function () {
    $project=Project::find(2);
    return $project->task;
});