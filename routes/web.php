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

Route::get('/testapi', 'HomeController@testapi');
Route::get('/image/cata/delete/{cataname}', 'ImageController@removeCata');
Route::get('/home', 'HomeController@index');
Route::get('/image/groupadd','ImageController@group_add');
Route::post('/image/groupadd','ImageController@group_store');
Route::resource('/image', 'ImageController');
