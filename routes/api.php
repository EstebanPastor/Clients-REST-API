<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/clients", "\App\Http\Controllers\ClientController@index");

Route::post("/clients", "\App\Http\Controllers\ClientController@store");

Route::get("/clients/{client}", "\App\Http\Controllers\ClientController@show");

Route::put("/clients/{client}", "\App\Http\Controllers\ClientController@update");

Route::delete("/clients/{client}", "\App\Http\Controllers\ClientController@destroy");