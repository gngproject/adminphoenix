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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Product - Show All
Route::get('/Send/ProductAll','API\APIController@apiproductall');

//Product - Women All
Route::get('/Send/ProductWomen','API\APIController@apiproductwomen');

//Product - Men All
Route::get('/Send/ProductMen','API\APIController@apiproductmen');

//Product - Universal All
Route::get('/Send/ProductUnvr','API\APIController@apiproductunvr');

//Advertisment - Show All
Route::get('/Advertis-All','API\APIController@apiadvertiseall');