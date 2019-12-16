<?php

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

Route::resource('post', 'PostsController');

Route::get('/', function (){
    return "Hi";
});

Route::get('/{name}', function ($name){
    return view('home', compact('name'));
});
