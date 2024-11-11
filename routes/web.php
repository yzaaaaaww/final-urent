<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\PolicyController;
use App\Filament\App\Pages\TenantSpace;
use App\Http\Controllers\SensorDataController;

// Sensor data route - place this BEFORE other routes
Route::post('/sensor/data/store', [SensorDataController::class, 'store'])
    ->name('sensor-data.store')
    ->withoutMiddleware(['web'])  // Remove web middleware
    ->middleware(['api'])  // Use api middleware only
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/terms', [TermsController::class, 'show'])->name('terms.show');
Route::get('/policy', [PolicyController::class, 'show'])->name('policy.show'); 

Route::get('/tenant-space/payment-success/{record}', [TenantSpace::class, 'handlePaymentSuccess'])
    ->name('filament.app.pages.tenant-space.payment-success');

Route::get('/tenant-space/payment-cancel', [TenantSpace::class, 'handlePaymentCancel'])
    ->name('filament.app.pages.tenant-space.payment-cancel');