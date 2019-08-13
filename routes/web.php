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

use App\Mail\NewUserWelcomeMail;

Auth::routes();

Route::get('/email', function () {
    return new NewUserWelcomeMail();
});

Route::post('/follow/{user}', 'FollowsController@store')->name('user.follow');

Route::get('/', 'PostsController@index');

Route::get('/p/create', 'PostsController@create');

Route::post('/p', 'PostsController@store');

Route::get('/p/{post}', 'PostsController@show');

Route::get('/p/{post}/edit', 'PostsController@edit')->name('post.edit');

Route::put('/p/{post}/update', 'PostsController@update')->name('post.update');

Route::get('/p/{post}/delete', 'PostsController@delete')->name('post.delete');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/profile/{user}/followers', 'FollowsController@getFollowers')->name('profile.followers');

Route::get('/profile/{user}/following', 'FollowsController@getFollowing')->name('profile.following');

Route::get('/p/{post}/comments', 'CommentsController@index');

Route::post('/p/{post}/comment', 'CommentsController@store');

Route::get('/p/{post}/comments/delete/{id}', 'CommentsController@delete')->name('comment.delete');

Route::post('/comment/{post}', 'CommentsController@store');

Route::get('/p/{post}/like', 'PostsController@getLike')->name('post.getlike');

Route::get('/search', 'SearchController@getResults')->name('search.results');

Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});

