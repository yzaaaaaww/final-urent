<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'api/*',
        'sensor-data',
        'sensor/data/store',
        'sensor/data/*',
        'sensor/electric/data/store',
        'sensor/electric/data/*',
        'electric-sensor'
    ];
} 