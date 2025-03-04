<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//Endpoint listado de players
Route::get('/players',function(){
    return 'Listado de jugadores';
});