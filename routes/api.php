<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MedicalRecordController;

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
    Route::get('/players/{id}/medicalrecord', [PlayerController::class, 'show_medical_record']);
    //Endpoint busqueda de player con first_name
    Route::get('/players/first_name/{first_name}', [PlayerController::class, 'showByFirstName']);
    Route::get('/players/{id}', [PlayerController::class, 'show']);
    //Endpoint insertar nuevo player
    Route::post('/players', [PlayerController::class, 'store']);
    //Endpoint actualizar un nuevo player
    Route::put('/players/{id}', [PlayerController::class, 'update']);
    //Endpoint delete player
    Route::delete('/players/{id}', [PlayerController::class, 'destroy']);

    //Endpoints teams
    Route::get('/teams', [TeamController::class, 'index']);
    Route::get('/teams/{id}', [TeamController::class, 'show']);
    Route::post('/teams', [TeamController::class, 'store']);
    Route::put('/teams/{id}', [TeamController::class, 'update']);
    Route::delete('/teams/{id}', [TeamController::class, 'destroy']);

    //Endpoints medicalrecorts
    Route::get('/medicalrecords', [MedicalRecordController::class, 'index']);
    Route::get('/medicalrecords/{id}', [MedicalRecordController::class, 'show']);
    Route::get('/medicalrecords/{id}/player', [MedicalRecordController::class, 'show_player']);

});


