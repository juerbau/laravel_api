<?php

return [
    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'login', // Wichtig: Fügen Sie Ihren Login-Endpunkt hinzu
        'logout',
        'user'
        // ... weitere benötigte Routen
    ],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        'http://localhost:3000', // Ihre Frontend-Domain
        env('APP_URL') // Ihre Backend-URL
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
// Wichtig:
    'supports_credentials' => true,
];
