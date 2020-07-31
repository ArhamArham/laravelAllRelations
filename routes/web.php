<?php

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
    // factory(\App\User::class,3)->create();
    // \App\Address::create([
    //     'user_id'=>1,
    //     'country'=>'uk'
    // ]);
    // \App\Address::create([
    //     'user_id'=>2,
    //     'country'=>'pakistan'
    // ]);
    // \App\Address::create([
    //     'user_id'=>3,
    //     'country'=>'india'
    // ]);
    // $users=\App\User::with('address')->get();
    // $user=factory(\App\User::class)->create();
    // $address=new \App\Address([
    //     'country'=>'indonesia'
    // ]);
    // $address->user()->associate($user);
    // $address->save();
    // $user->address()->create([
    //     'country'=>'uk'
    // ]);
    $addresses=\App\Address::with('user')->get();
    return view('users.index',compact('addresses'));
});