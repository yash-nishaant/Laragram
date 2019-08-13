<?php

use Illuminate\Http\Request;

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

// Route::get('/p/{post}/comments', 'CommentsController@index');

Route::middleware('auth:api')->group(function () {
    // Route::post('/p/{post}/comment', 'CommentsController@store');
});




