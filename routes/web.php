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

Auth::routes();
Route::get('user/list', 'UserController@showUsers')->name('list_users');
Route::post('user/status', 'UserController@changeStatus')->name('change_user_status');
Route::post('user/role', 'UserController@changeRole')->name('change_user_role');
Route::get('/home', 'HomeController@index');
