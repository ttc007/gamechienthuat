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


Route::resource('/nhanvats', 'API\NhanvatController');
Route::resource('/{nhanvat_id}/votuongs', 'API\VotuongController');
Route::resource('/{nhanvat_id}/tranhinhs', 'API\TranhinhController');

Route::get('/{nhanvat_id}/{kedich_id}/quyetchien', 'NhanvatController@quyetchien');