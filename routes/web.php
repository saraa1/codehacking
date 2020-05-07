<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostController@post']);



Route::group(['middleware'=> 'admin'], function (){
    Route::get('/admin',function (){

        return view('admin.index');
    });

    Route::resource('/admin/user','AdminUserController',['names'=>[
        'index'=>'admin.user.index',
        'create'=>'admin.user.create',
        'edit'=>'admin.user.edit',

    ]]);

    Route::resource('/admin/post','AdminPostController',['names'=>[
        'index'=>'admin.post.index',
        'create'=>'admin.post.create',
        'edit'=>'admin.post.edit',

    ]]);

    Route::resource('/admin/categories','AdminCategoriesController',['names'=>[
        'index'=>'admin.categories.index',
        'edit'=>'admin.categories.edit',

    ]]);

    Route::resource('/admin/media','AdminMediaController',['names'=>[
        'index'=>'admin.media.index',
        'create'=>'admin.media.create',



    ]]);
    Route::delete('delete/media','AdminMediaController@deleteMedia');

    Route::resource('/admin/comments','PostCommentController',['names'=>[
        'index'=>'admin.comments.index',
        'show'=>'admin.comments.show'

    ]]);

    Route::resource('/admin/comment/replies','CommentReplyController',['names'=>[
        'index'=>'admin.comment.replies.index',
        'show'=>'admin.comment.replies.show',

    ]]);

});

Route::group(['middleware'=>'auth'],function(){

    Route::post('comment/reply','CommentReplyController@createReply');
});


