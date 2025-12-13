<?php


return [
    'driver' => env('SESSION_DRIVER', 'cookie'),
    'lifetime' => env('SESSION_LIFETIME', 120),
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => storage_path('framework/sessions'),
    'connection' => null,
// Wichtig:
    'domain' => env('SESSION_DOMAIN', null),
    'path' => '/',
    'secure' => env('SESSION_SECURE_COOKIE', false),
    'http_only' => true,
    'same_site' => 'lax',
];
