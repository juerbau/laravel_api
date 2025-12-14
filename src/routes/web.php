<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});


//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth'); // Ohne :sanctum, der 'web'-Guard ist Standard


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (!auth()->attempt($credentials)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    // Laravel setzt HIER automatisch das Set-Cookie, da die 'web'-Middleware aktiv ist
    return response()->json(['message' => 'Logged in']);
});

Route::post('/logout', function (Request $request) {
    auth()->guard('web')->logout();

    // Session komplett ungültig machen und Token regenerieren
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json(['message' => 'Logged out successfully'], 200);
});

