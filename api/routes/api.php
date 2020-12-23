<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'App\Http\Controllers\Api\Auth\AuthController@login');
Route::post('registration', 'App\Http\Controllers\Api\Auth\AuthController@register');

Route::group(['middleware' => 'auth:api', 'namespace' => 'App\Http\Controllers\Api'], static function () {
    Route::post('upload', 'FileController@upload');

    Route::get('user', 'User\UserController@user');
    Route::put('users/{user}/change-info', 'User\UserController@changeInfo');
    Route::put('users/{user}/change-password', 'User\UserController@changePassword');

    Route::apiResource('users', 'User\UserController');
    Route::apiResource('roles', 'User\RoleController');
    Route::apiResource('products', 'Product\ProductController');
});
