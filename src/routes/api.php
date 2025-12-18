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
        //return json_encode(['name' => 'Furzkanone']);
    });

});


Route::post('/login-api', function (Request $request) {
    // Validierung der Eingaben
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Authentifizierung prüfen
    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // 1. Token erstellen: 'authToken' ist ein Name für den Token
        $token = $user->createToken('authToken')->plainTextToken;

        // 2. Token und User-Daten zurückgeben
        return response()->json([
            'user' => $user,
            'token' => $token, // Der Klartext-Token
        ], 200);
    }

    // Login fehlgeschlagen
    return response()->json(['message' => 'Invalid credentials'], 401);
});

// Geschützte Route, die den Token erwartet
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


// Route::apiResource('tests', 'App\Http\Controllers\Api\TestController');
