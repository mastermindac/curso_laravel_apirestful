<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

use App\Http\Middleware\ApiForceAcceptHeader;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

/*
//Endpoint listado de players
Route::get('/players', [PlayerController::class, 'index'])->middleware([ApiForceAcceptHeader::class]);
//Endpoint busqueda de player con id
Route::get('/players/{id}', [PlayerController::class, 'show'])->middleware([ApiForceAcceptHeader::class]);
//Endpoint busqueda de player con first_name
Route::get('/players/first_name/{first_name}', [PlayerController::class, 'showByFirstName'])->middleware([ApiForceAcceptHeader::class]);
Route::get('/players/{id}', [PlayerController::class, 'show'])->middleware([ApiForceAcceptHeader::class]);
//Endpoint insertar nuevo player
Route::post('/players', [PlayerController::class, 'store'])->middleware([ApiForceAcceptHeader::class]);
*/

Route::middleware([ApiForceAcceptHeader::class])->group(function () {
    //Endpoint listado de players
    Route::get('/players', [PlayerController::class, 'index']);
    //Endpoint busqueda de player con id
    Route::get('/players/{id}', [PlayerController::class, 'show']);
    //Endpoint busqueda de player con first_name
    Route::get('/players/first_name/{first_name}', [PlayerController::class, 'showByFirstName']);
    Route::get('/players/{id}', [PlayerController::class, 'show']);
    //Endpoint insertar nuevo player
    Route::post('/players', [PlayerController::class, 'store']);
});


//Endpoint listado de teams
Route::get('/teams', [PlayerController::class, 'index'])->middleware([ApiForceAcceptHeader::class]);