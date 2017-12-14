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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/findfriends',function () {
// 	return view('findfriends');
// });

Route::get('/findfriends','FindFriendsController@index');
Route::get('/servisec','FindFriendsController@getAllFriends');
Route::get('/getdata','FindFriendsController@getData');