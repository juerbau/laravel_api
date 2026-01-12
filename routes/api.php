<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Session\Middleware\StartSession;

Route::middleware([
    EncryptCookies::class,
    AddQueuedCookiesToResponse::class,
    StartSession::class,
    'auth:sanctum',
])->group(function () {

    Route::get('/debug-stateful', function (Request $request) {
        return response()->json([
            'has_session_cookie' => $request->hasCookie(config('session.cookie')),
            'session_cookie' => $request->cookie(config('session.cookie')),
            'session_started' => $request->hasSession(),
            'session_id' => session()->getId(),
            'auth_check' => auth()->check(),
            'user_id' => optional(auth()->user())->id,
        ]);
    });

    Route::get('/user', fn(Request $request) => $request->user());
    //Route::apiResource('todos', TodoController::class)->only(['index', 'store', 'update', 'destroy']);
});
