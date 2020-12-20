<?php

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

Route::post('login', 'App\Http\Controllers\Api\Auth\AuthController@login');
Route::post('registration', 'App\Http\Controllers\Api\Auth\AuthController@register');

Route::group(['middleware' => 'auth:api', 'namespace' => 'App\Http\Controllers\Api'], static function () {
    Route::apiResource('users', 'User\UserController');
});
