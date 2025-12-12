<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', function (Request $request) {
    // nur zum Testen
    return response()->json([
        'email' => $request->email,
    ]);
});

Route::middleware('sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

