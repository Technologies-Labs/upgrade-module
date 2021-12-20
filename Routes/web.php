<?php
use Modules\Upgrade\Http\Controllers\UpgradeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Dashbord Routes
 */
Route::middleware(['auth'])->group(function () {
    Route::prefix('upgrades')->group(function() {
        Route::get('/', [UpgradeController::class , 'index'])->name('users.upgrades');
    });
});

 /**
 * Website Routes
 */
Route::middleware(['auth'])->group(function () {

    Route::prefix('upgrade')->group(function() {
        Route::get('plane', [UpgradeController::class , 'upgradePage'])->name('upgrade.plane');
        Route::post('store', [UpgradeController::class , 'upgrade'])->name('user.upgrade');
    });
});

