<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Users
route::get('users','api\apiUserController@getAll');
route::get('users/{id}','api\apiUserController@show');
route::post('users','api\apiUserController@create');
route::put('users/{id}','api\apiUserController@update');
route::get('users/{id}/catalogue','api\apiUserController@getCatalogue');
route::get('userscata','api\apiUserController@getAllCatalogue');
route::get('users/{id}/dressing','api\apiUserController@getDress');
route::get('usersdress','api\apiUserController@getAllDressing');
route::get('usersfull/{id}','api\apiUserController@getFull');

//Catalogues


//Dressings
