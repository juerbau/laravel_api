<?php

return [

    'paths' => [
        'api/*',
        'login',
        'logout',
        'sanctum/csrf-cookie',
        'forgot-password',
        'reset-password',
        'email/verification-notification'
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
    'supports_credentials' => true,
];
