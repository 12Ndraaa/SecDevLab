<?php

use App\Http\Controllers\LabEnvironmentController;
use Illuminate\Support\Facades\Route;

// Optional Subdomain Wildcard Mode: https://{token}.{LAB_WILDCARD_DOMAIN}/...
$wildcard = trim((string) config('lab.wildcard_domain', ''));
if ($wildcard !== '') {
    Route::domain('{token}.'.strtolower(ltrim($wildcard, '.')))->group(function (): void {
        Route::any('/{tail?}', [LabEnvironmentController::class, 'handleBySubdomainToken'])
            ->where(['token' => '[a-f0-9]{32,64}', 'tail' => '.*'])
            ->name('lab-subdomain');
    });
}

// Default Path Capability Token Mode (Railway Free & Localhost): /lab/{token}/...
Route::any('/lab/{token}/{tail?}', [LabEnvironmentController::class, 'handleByToken'])
    ->where(['token' => '[a-f0-9]{32,64}', 'tail' => '.*'])
    ->name('lab-instance');
