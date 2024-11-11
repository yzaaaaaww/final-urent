<?php

use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\ElectricSensorController;
use Illuminate\Support\Facades\Route;

// For storing new sensor data
Route::post('/sensor-data', [SensorDataController::class, 'store']);
// For retrieving sensor data (should use 'index' method instead of 'store')
Route::get('/sensor-data', [SensorDataController::class, 'index']);

Route::post('/electric-sensor', [ElectricSensorController::class, 'store'])
    ->middleware(['api'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);