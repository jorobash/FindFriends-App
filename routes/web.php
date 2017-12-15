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

Route::get('/getdcountryName', 'FindFriendsController@getCountryName');
Route::get('/ajax/ajaxfindfriends', 'FindFriendsController@getdata');

Route::get('/getdata', 'FindFriendsController@getData');
