<?php

use Illuminate\Support\Facades\Route;

Route::get('/api/docs', function () {
    // Simple placeholder – would normally serve Swagger UI or similar
    return response()->json([
        'title' => 'Greentify API Documentation',
        'endpoints' => [
            '/api/register',
            '/api/login',
            '/api/logout',
            '/api/articles',
            '/api/articles/{id}',
            '/api/categories',
            '/api/categories/{id}',
        ],
    ]);
});
