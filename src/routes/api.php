<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware(['auth:sanctum', 'web']);

Route::post('/todos', [TodoController::class, 'store'])->middleware(['auth:sanctum', 'web']);


// Route::apiResource('tests', 'App\Http\Controllers\Api\TestController');
