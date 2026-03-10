<?php
//dd('API FILE LOADED');
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\TimeTrackController;



Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'role:admin'])->get('/admin-only', function () {
    return "Solo admin puede acceder";
});

Route::middleware(['auth:sanctum'])->group(function () {

    // Solo admins pueden ver y borrar todo
    Route::middleware('role:admin')->group(function () {
        Route::delete('incidents/{incident}', [IncidentController::class, 'destroy']);
        Route::delete('time-tracks/{timeTrack}', [TimeTrackController::class, 'destroy']);
    });

    // Workers y supervisores pueden ver y crear sus propios registros
    Route::apiResource('incidents', IncidentController::class)
        ->except(['destroy']); // eliminación controlada por admin

    Route::apiResource('time-tracks', TimeTrackController::class)
        ->except(['destroy']); // eliminación controlada por admin
});