<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

use App\Http\Middleware\ApiForceAcceptHeader;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//Endpoint listado de players
Route::get('/players', [PlayerController::class, 'index'])->middleware([ApiForceAcceptHeader::class]);
//Endpoint busqueda de player con id
Route::get('/players/{id}', [PlayerController::class, 'show'])->middleware([ApiForceAcceptHeader::class]);
//Endpoint busqueda de player con first_name
Route::get('/players/first_name/{first_name}', [PlayerController::class, 'showByFirstName'])->middleware([ApiForceAcceptHeader::class]);



//Endpoint listado de teams
Route::get('/teams', [PlayerController::class, 'index'])->middleware([ApiForceAcceptHeader::class]);