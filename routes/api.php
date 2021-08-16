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
route::get('users','Api\apiUserController@getAll');
route::get('users/{id}','Api\apiUserController@show');
route::post('users','Api\apiUserController@create');
route::put('users/{id}','Api\apiUserController@update');
route::get('users/{id}/catalogue','Api\apiUserController@getCatalogue');
route::get('users/{id}/dressing','Api\apiUserController@getDress');
route::get('userfull/{id}','Api\apiUserController@getFull');
route::get('usersdress','Api\apiUserController@getAllDressing');
route::get('userscata','Api\apiUserController@getAllCatalogue');
route::get('usersfull','Api\apiUserController@getFulls');

//Catalogues


//Dressings
