<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Route::post('/login', function (Request $request) {
//    $credentials = $request->validate([
//        'email' => ['required', 'email'],
//        'password' => ['required'],
//    ]);
//
//    if (! Auth::attempt($credentials)) {
//        return response()->json(['message' => 'Invalid credentials'], 401);
//    }
//
//    $request->session()->regenerate();
//
//    return response()->noContent();
//});


Route::get('/', function () {
    return view('welcome');
});
