<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Route::post('/login', function (Request $request) {
//    $credentials = $request->only('email', 'password');
//    if (!auth()->attempt($credentials)) {
//        return response()->json(['message' => 'Invalid credentials'], 401);
//    }
//    return response()->json(['message' => 'Logged in']);
//});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('/user', function(Request $request){
//    // Ignoriere auth:sanctum Middleware hier
//    return response()->json([
//        'session_id' => session()->getId(),
//        'cookies' => $request->cookies->all(),
//        'user' => Auth::check() ? Auth::user() : null,
//    ]);
//});

//Route::middleware('web')->get('/user', function(Request $request){
//    return response()->json([
//        'user' => $request->user(),
//        'session_id' => session()->getId(),
//        'cookies' => $request->cookies->all()
//    ]);
//});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // Prüfen, ob Laravel den User sieht
    logger('User object:', ['user' => $request->user()]);
    logger('All cookies:', ['cookies' => $request->cookies->all()]);

    if (!$request->user()) {
        return response()->json([
            'message' => 'No authenticated user',
            'cookies' => $request->cookies->all(),
            'session_id' => session()->getId(),
        ], 401);
    }

    return response()->json($request->user());
});*/

//Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
//    Auth::guard('web')->logout();
//
//    $request->session()->invalidate();
//    $request->session()->regenerateToken();
//
//    return response()->json([
//        'message' => 'Logged out'
//    ]);
//});

