<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;


// === ROUTE UNTUK USER (PENUMPANG) ===
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])
        ->middleware('permission:view dashboard')
        ->name('user.dashboard');

    // === ROUTE PER KATEGORI MOBIL ===
    Route::get('/car/suv', fn() => view('cars.suv'))
        ->middleware('permission:view available cars')
        ->name('car.suv');

    Route::get('/car/sedan', fn() => view('cars.sedan'))
        ->middleware('permission:view available cars')
        ->name('car.sedan');

    Route::get('/car/pickup', fn() => view('cars.pickup'))
        ->middleware('permission:view available cars')
        ->name('car.pickup');

    Route::get('/car/minivan', fn() => view('cars.minivan'))
        ->middleware('permission:view available cars')
        ->name('car.minivan');

    Route::get('/car/truckbox', fn() => view('cars.truckbox'))
        ->middleware('permission:view available cars')
        ->name('car.truckbox');

    Route::get('/car/electric', fn() => view('cars.electric'))
        ->middleware('permission:view available cars')
        ->name('car.electric');

    Route::get('/car/sport', fn() => view('cars.sport'))
        ->middleware('permission:view available cars')
        ->name('car.sport');

    Route::get('/car/luxury', fn() => view('cars.luxury'))
        ->middleware('permission:view available cars')
        ->name('car.luxury');
});


// === ROUTE UNTUK ADMIN ===
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

    // Dashboard Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
        ->middleware('permission:view dashboard')
        ->name('admin.dashboard');

    // Manage Car
    Route::prefix('admin')->group(function () {
        Route::get('/cars', [CarController::class, 'index'])
            ->middleware(['permission:monitor cars|manage all cars'])
            ->name('admin.cars.index');

        Route::get('/create-car', [CarController::class, 'create'])
            ->middleware(['permission:monitor cars|manage all cars'])
            ->name('admin.cars.create');

        Route::post('/create-car', [CarController::class, 'store'])
            ->middleware(['permission:monitor cars|manage all cars'])
            ->name('admin.cars.store');

        // Route Edit & Update
        Route::get('/cars/{id}/edit', [CarController::class, 'edit'])
            ->middleware(['permission:monitor cars|manage all cars'])
            ->name('admin.cars.edit');

        Route::put('/cars/{id}', [CarController::class, 'update'])
            ->middleware(['permission:monitor cars|manage all cars'])
            ->name('admin.cars.update');

        Route::delete('/cars/{id}', [CarController::class, 'destroy'])
            ->middleware(['permission:monitor cars|manage all cars'])
            ->name('admin.cars.destroy');

        // Preview Cars 
        Route::get('/cars/{id}/preview', [CarController::class, 'preview'])
            ->middleware(['permission:monitor cars'])
            ->name('admin.cars.preview');
    });

    // Route untuk Profile Admin
    Route::prefix('admin/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])
            ->middleware('permission:edit own profile')
            ->name('admin.profile.edit');

        Route::patch('/', [ProfileController::class, 'update'])
            ->middleware('permission:edit own profile')
            ->name('admin.profile.update');

        Route::delete('/', [ProfileController::class, 'destroy'])
            ->middleware('permission:edit own profile')
            ->name('admin.profile.destroy');
    });

    // Route untuk mengelola Users
    Route::prefix('admin/users')->group(function () {
        // Menampilkan daftar user
        Route::get('/', [UserController::class, 'index'])
            ->middleware('permission:view users|create users|edit users|delete users')
            ->name('admin.users.index');

        // Menampilkan form tambah user
        Route::get('/create', [UserController::class, 'create'])
            ->middleware('permission:create users')
            ->name('admin.users.create');

        // Menyimpan user baru
        Route::post('/', [UserController::class, 'store'])
            ->middleware('permission:create users')
            ->name('admin.users.store');

        // Menampilkan form edit user
        Route::get('/{user}/edit', [UserController::class, 'edit'])
            ->middleware('permission:edit users')
            ->name('admin.users.edit');

        // Menyimpan perubahan user
        Route::put('/{user}', [UserController::class, 'update'])
            ->middleware('permission:edit users')
            ->name('admin.users.update');

        // Menghapus user
        Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
            ->middleware('permission:delete users')
            ->name('admin.users.destroy');
    });
});


// === ROUTE UNTUK OPERATOR ===
Route::middleware(['auth', 'verified', 'role:operator'])->group(function () {
    Route::get('/operator/dashboard', [DashboardController::class, 'operatorDashboard'])
        ->middleware('permission:view dashboard')
        ->name('operator.dashboard');

    // Route untuk Profile Operator
    Route::prefix('operator/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])
            ->middleware('permission:edit own profile')
            ->name('operator.profile.edit');

        Route::patch('/', [ProfileController::class, 'update'])
            ->middleware('permission:edit own profile')
            ->name('operator.profile.update');

        Route::delete('/', [ProfileController::class, 'destroy'])
            ->middleware('permission:edit own profile')
            ->name('operator.profile.destroy');
    });
});


// First Link
Route::get('/', function () {
    return view('auth.login');
});

// SEMENTARA JANGAN DIHAPUS
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// SAMPAI INI

require __DIR__ . '/auth.php';
