<?php

Route::get('/', 'TaskController@index');
Route::get('/chats', 'ChatController@index');
Route::get('/chats/{receiver}', 'ChatController@show');
Route::get('/chats/{receiver}/fetch', 'MessageController@fetchMessages');
Route::post('/chats/{receiver}/send', 'MessageController@sendMessage');
Auth::routes();
