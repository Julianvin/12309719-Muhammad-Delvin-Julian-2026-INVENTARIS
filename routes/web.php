<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//auth routes
Route::get('/', fn() => view('welcome'))->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    // Categories
    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{category}/edit', 'edit')->name('edit');
        Route::put('/{category}', 'update')->name('update');
    });

    // Items
    Route::controller(ItemController::class)->prefix('items')->name('items.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/export', 'export')->name('export');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{item}/edit', 'edit')->name('edit');
        Route::put('/{item}', 'update')->name('update');
    });

    // Lending Detail
    // Route::get('/items/lending/detail/{item}', [LendingController::class, 'detail'])->name('items.lending.detail');

    // Users
    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/admin', 'adminIndex')->name('admin.index');
        Route::get('/operator', 'operatorIndex')->name('operator.index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::put('/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('destroy');
        Route::post('/{user}/reset', 'resetPassword')->name('reset');
        Route::get('/admin/export', 'exportAdmin')->name('admin.export');
        Route::get('/operator/export', 'exportOperator')->name('operator.export');
    });
});

Route::middleware(['auth', 'role:operator'])->prefix('operator')->name('operator.')->group(function () {
    Route::get('/dashboard', fn() => view('operator.dashboard'))->name('dashboard');
    Route::get('/items', [LendingController::class, 'operatorItems'])->name('items');

    // Lending
    Route::controller(LendingController::class)->prefix('lending')->name('lending.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/detail/{item}', 'detail')->name('detail');
        Route::get('/export', 'export')->name('export');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::post('/{lending}/return', 'returnItem')->name('return');
        Route::delete('/{lending}', 'destroy')->name('destroy');
    });

    // Profile
    Route::controller(UserController::class)->prefix('users')->name('profile.')->group(function () {
        Route::get('/edit', 'operatorProfileEdit')->name('edit');
        Route::post('/edit', 'operatorProfileUpdate')->name('update');
    });
});
