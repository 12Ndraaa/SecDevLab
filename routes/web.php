<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CveController;
use App\Http\Controllers\Owner\CategoryLabController;
use App\Http\Controllers\Owner\CveManagementController;
use App\Http\Controllers\Owner\OwnerDashboardController;
use App\Http\Controllers\Owner\UserManagementController;
use App\Http\Controllers\PreferenceController;
use Illuminate\Support\Facades\Route;

// 1. Cyber Security Academy Home, Catalog, Dashboard, Leaderboard & CVE Encyclopedia
Route::get('/', [AcademyController::class, 'landing'])->name('home');
Route::redirect('/home', '/');
Route::get('/web-security/all-labs', [AcademyController::class, 'allLabs'])->name('all-labs');
Route::get('/web-security/dashboard', [AcademyController::class, 'dashboard'])->name('dashboard');
Route::get('/web-security/hall-of-fame', [AcademyController::class, 'leaderboard'])->name('hall-of-fame');
Route::get('/leaderboard', [AcademyController::class, 'leaderboard'])->name('leaderboard');

// CVE Knowledge Base
Route::get('/cve', [CveController::class, 'index'])->name('cve.index');
Route::get('/cve/{slug}', [CveController::class, 'show'])->name('cve.show');

// Zero-JS Session Preferences (Bilingual EN/ID; Light-only theme)
Route::post('/preferences/locale', [PreferenceController::class, 'setLocale'])->name('preferences.locale');
Route::any('/preferences/theme', static fn () => abort(404));

// 2. Multi-User Authentication Routes (/users/*)
Route::get('/users', [AuthController::class, 'showLogin'])->name('login');
Route::post('/users', [AuthController::class, 'login']);
Route::get('/users/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/users/register', [AuthController::class, 'register']);
Route::post('/users/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/users/youraccount', [AuthController::class, 'account']);
    Route::get('/users/youraccount/personaldetails', [AuthController::class, 'account'])->name('account');
    Route::get('/certificate', [AcademyController::class, 'certificate'])->name('certificate');
});

// 3. Owner Control Panel (Strictly Role: owner)
Route::middleware(['auth', 'owner'])->prefix('owner')->name('owner.')->group(function () {
    Route::get('/', [OwnerDashboardController::class, 'index'])->name('dashboard');

    // CVE CRUD + trickest/cve importer
    Route::get('/cves', [CveManagementController::class, 'index'])->name('cves.index');
    Route::get('/cves/create', [CveManagementController::class, 'create'])->name('cves.create');
    Route::post('/cves', [CveManagementController::class, 'store'])->name('cves.store');
    Route::post('/cves/import-trickest', [CveManagementController::class, 'importTrickest'])->name('cves.import');
    Route::get('/cves/{cve}/edit', [CveManagementController::class, 'edit'])->name('cves.edit');
    Route::put('/cves/{cve}', [CveManagementController::class, 'update'])->name('cves.update');
    Route::post('/cves/{cve}/toggle-status', [CveManagementController::class, 'toggleStatus'])->name('cves.toggle');
    Route::delete('/cves/{cve}', [CveManagementController::class, 'destroy'])->name('cves.destroy');

    // Categories CRUD
    Route::get('/categories', [CategoryLabController::class, 'categoriesIndex'])->name('categories.index');
    Route::get('/categories/create', [CategoryLabController::class, 'createCategory'])->name('categories.create');
    Route::post('/categories', [CategoryLabController::class, 'storeCategory'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryLabController::class, 'editCategory'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryLabController::class, 'updateCategory'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryLabController::class, 'destroyCategory'])->name('categories.destroy');

    // Labs CRUD
    Route::get('/labs', [CategoryLabController::class, 'labsIndex'])->name('labs.index');
    Route::get('/labs/create', [CategoryLabController::class, 'createLab'])->name('labs.create');
    Route::post('/labs', [CategoryLabController::class, 'storeLab'])->name('labs.store');
    Route::get('/labs/{lab}/edit', [CategoryLabController::class, 'editLab'])->name('labs.edit');
    Route::put('/labs/{lab}', [CategoryLabController::class, 'updateLab'])->name('labs.update');
    Route::delete('/labs/{lab}', [CategoryLabController::class, 'destroyLab'])->name('labs.destroy');

    // Users & Progress Reset
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::post('/users/{user}/reset-progress', [UserManagementController::class, 'resetProgress'])->name('users.reset');
    Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
});

// 4. Authenticated Lab Launchers & Capability Token Lifecycle Controls (Legacy /lab-env/* Blocked)
Route::any('/lab-env/{any?}', static fn () => abort(404))->where('any', '.*');

Route::middleware('auth')->group(function () {
    Route::get('/web-security/mystery-lab-challenge/launch', [AcademyController::class, 'launchMysteryLab']);
    Route::get('/academy/labs/launch/{labId}', [AcademyController::class, 'launchLab']);
    Route::get('/academy/labs/session/{token}/control', [AcademyController::class, 'labControl'])
        ->where('token', '[a-f0-9]{32,64}');
    Route::post('/academy/labs/session/{token}/reset', [AcademyController::class, 'resetLabSession'])
        ->where('token', '[a-f0-9]{32,64}');
    Route::post('/academy/labs/session/{token}/renew', [AcademyController::class, 'renewLabSession'])
        ->where('token', '[a-f0-9]{32,64}');
    Route::post('/academy/labs/{labId}/reset', [AcademyController::class, 'resetLabById']);
    Route::post('/academy/labs/{labId}/renew', [AcademyController::class, 'renewLabById']);
});

// 5. Widget & Session Helper Endpoints
Route::post('/api/widgets', [AcademyController::class, 'widgets']);
Route::get('/session-info', [AcademyController::class, 'sessionInfo']);

// 6. All Lab Detail Pages & 187 /web-security/* Learning Pages (Corporate routes return 404)
Route::fallback([AcademyController::class, 'resolvePage']);
