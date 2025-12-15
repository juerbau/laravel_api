<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Route::get('/user', function (Request $request) {
//        return $request->user();
//    })->middleware(['web', 'auth:sanctum']);

//Route::post('/todos', [TodoController::class, 'store'])->middleware(['web', 'auth:sanctum']);

Route::middleware(['web', 'auth:sanctum'])->group(function () {

    // Resource Route für Todos (deckt index, store, update, destroy ab)
    Route::resource('todos', TodoController::class)->only(['index', 'store', 'update', 'destroy']);

    // Beispiel: Abruf der aktuellen Benutzerdaten
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});


// Route::apiResource('tests', 'App\Http\Controllers\Api\TestController');
