<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Public Routes

// Route::get('/', function () {
//     return view("auth.login");
// });

// Private Routes

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
// ->middleware('auth:sanctum');
