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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'api', 'middleware' => ['cors', 'api'], 'namespace' => 'API'],function(){
  Route::get("/image","ApiController@json_image");

  Route::get("/image/search/{name}","ApiController@search_image");

  Route::get("/image/wordbreak/{words}","ApiController@work_break");
  Route::get("/image/test/","ApiController@test");

  Route::get("/image/search_multi/{name}","ApiController@search_image_multi");

  Route::get("/image/hash/{hash}","ApiController@search_image");
});

