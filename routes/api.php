<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/tasks', 'TaskController@tasks');
Route::post('/tasks', 'TaskController@store');
Route::get('/chats/{receiver}', 'MessageController@fetchMessages');
Route::post('/chats/{receiver}', 'MessageController@sendMessage');