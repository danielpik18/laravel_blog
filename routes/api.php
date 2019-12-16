<?php

use Illuminate\Http\Request;
use App\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/insert', function (){
    DB::insert('insert into posts(title, content) values(?, ?)', ['Node JS Free Course', 'Lorem ipsum etc etc etc...']);
});

Route::get('/read', function (){
   $result = DB::select('select * from posts where id = ?', [1]);

//   foreach ($result as $post){
//       return $post->title;
//   }

    return var_dump($result);
});

Route::get('/update', function (){
    $updated_row = DB::update('update posts set title = "New post title 123" where id = ?', [1]);
    return $updated_row;
});

Route::get('delete', function (){
   $deleted_row = DB::delete('delete from posts where id = ?', [1]);

    return $deleted_row;
});



//ORM

Route::get('/readAll', function (){
   $posts = Post::all();
   foreach ($posts as $post){
       return $post->title;
   }
});

Route::get('/find', function (){
    $post = Post::where('id', 3)->orderBy('title', 'desc')->get();

    return $post;
});

Route::get('/save', function (){
    $post = Post::find(4);
    $post->title = 'Post title UPDATEEEEED';
    $post->content = 'Content of post 2';
    $post->save();
    return $post;
});


//MASS ASSIGNMENT
Route::get('/create', function (){
    Post::create([
        'title'=>'One post a title :)',
        'content'=>'One post some content'
    ]);
});

Route::get('/actualize', function (){
    Post::where('id', 2)->update([
        'is_admin'=>1
    ]);
});

Route::get('/remove', function (){
    $deleted_post = Post::find(3);
    $deleted_post->delete();
    return $deleted_post;
});

Route::get('/remove2', function (){
    Post::destroy(4);
});

//
//  Soft delete
//

Route::get('/softDelete', function (){
    Post::find(2)->delete();
});
