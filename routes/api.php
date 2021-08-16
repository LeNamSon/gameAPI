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

// //Users
// route::get('users','Api\apiUserController@getAll');
// route::get('users/{id}','Api\apiUserController@show');
// route::post('users','Api\apiUserController@create');
// route::put('users/{id}','Api\apiUserController@update');
// route::get('users/{id}/catalogue','Api\apiUserController@getCatalogue');
// route::get('users/{id}/dressing','Api\apiUserController@getDress');
// route::get('userfull/{id}','Api\apiUserController@getFull');
// route::get('usersdress','Api\apiUserController@getAllDressing');
// route::get('userscata','Api\apiUserController@getAllCatalogue');
// route::get('usersfull','Api\apiUserController@getFulls');

//GET method
// GET: api/users
route::get('users','Api\apiUserController@getUsers');

// GET:api/users/catalogue
route::get('users/catalogue','Api\apiUserController@getUsersCatalogue');

// GET:api/users/dressing
route::get('users/dressing','Api\apiUserController@getUsersDressing');

// GET:api/users/full
route::get('users/full','Api\apiUserController@getUsersFull');

// GET: api/user/{id}
route::get('user/{id}', 'Api\apiUserController@getUser');

// GET: api/user/{id}/dressing 
route::get('user/{id}/dressing', 'Api\apiUserController@getUserDressing');

// GET:api/user/{id}/catalogue
route::get('user/{id}/catalogue', 'Api\apiUserController@getUserCatalogue');

// GET:api/user/{id}/full
route::get('user/{id}/full', 'Api\apiUserController@getUserFull');

//POST method
// POST: api/user
route::post('user','Api\apiUserController@createUser');

// POST:api/user/{id}/catalogue
route::post('user/{id}/catalogue','Api\apiUserController@createCatalogue');

// POST:api/user/{id}/dressing
route::post('user/{id}/dressing','Api\apiUserController@createDressing');

// PUT method
// PUT:api/user/{id}

// PUT:api/user/{id}/catalogue/{cat_id}

// PUT:api/user/{id}/dressing/{dressing_id}

// DELETE method
// DELETE:api/user/{id}

// DELETE:api/user/{id}/catalogue/{cat_id}

// DELETE:api/user/{id}/dressing/{dressing_id}



