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

    // Dashboard
    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])
        ->middleware('permission:view dashboard')
        ->name('user.dashboard');

    // Daftar Mobil & Detail
    Route::get('/user/daftar-mobil', [CarController::class, 'showAvailableCars'])
        ->middleware('permission:view available cars')
        ->name('user.cars.list');

    Route::get('/user/car-category/{category}', [CarController::class, 'showCategoryCars'])
        ->middleware('permission:view available cars')
        ->name('user.car.category');

    Route::get('/car/{id}', [CarController::class, 'showDetail'])
        ->middleware('permission:view available cars')
        ->name('user.car.detail');

    // Booking
    Route::get('/user/checkout/{car}', [BookingController::class, 'index'])
        ->middleware('permission:create booking')
        ->name('user.checkout');

    Route::post('/user/checkout/{car}', [BookingController::class, 'store'])
        ->middleware('permission:create booking')
        ->name('user.checkout.store');

    Route::get('/user/riwayat', [BookingController::class, 'riwayat'])
        ->middleware('permission:view booking history')
        ->name('user.history');

    // Profil
    Route::middleware(['role:user', 'permission:edit own profile'])->group(function () {
        Route::get('/user/profil', [ProfileController::class, 'showMobileProfile'])
            ->name('user.profil');

        Route::post('/user/profil/update', [ProfileController::class, 'updateUserProfile'])
            ->name('user.profile.update');
    });
});

// === ROUTE UNTUK ADMIN ===
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
        ->middleware('permission:view dashboard')
        ->name('admin.dashboard');

    // Mobil
    Route::prefix('admin')->group(function () {

        Route::middleware('permission:monitor cars|manage all cars')->group(function () {
            Route::get('/cars', [CarController::class, 'index'])->name('admin.cars.index');
            Route::get('/create-car', [CarController::class, 'create'])->name('admin.cars.create');
            Route::post('/create-car', [CarController::class, 'store'])->name('admin.cars.store');
            Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('admin.cars.edit');
            Route::put('/cars/{id}', [CarController::class, 'update'])->name('admin.cars.update');
            Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('admin.cars.destroy');
        });

        Route::get('/cars/{id}/preview', [CarController::class, 'preview'])
            ->middleware('permission:monitor cars')
            ->name('admin.cars.preview');

        // Booking
        Route::prefix('/booking')->middleware('permission:manage bookings')->group(function () {
            Route::get('/tersedia', [BookingController::class, 'tersedia'])->name('admin.mobil.tersedia');
            Route::get('/pending', [BookingController::class, 'pending'])->name('admin.mobil.pending');
            Route::get('/diterima', [BookingController::class, 'diterima'])->name('admin.mobil.diterima');
            Route::get('/ditolak', [BookingController::class, 'ditolak'])->name('admin.mobil.ditolak');
            Route::post('/update-car-status/{car}', [BookingController::class, 'updateStatus'])->name('admin.mobil.update.status');
        });
    });

    // Profil Admin
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

    // Manajemen User
    Route::prefix('admin/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])
            ->middleware('permission:view users|create users|edit users|delete users')
            ->name('admin.users.index');

        Route::get('/create', [UserController::class, 'create'])
            ->middleware('permission:create users')
            ->name('admin.users.create');

        Route::post('/', [UserController::class, 'store'])
            ->middleware('permission:create users')
            ->name('admin.users.store');

        Route::get('/{user}/edit', [UserController::class, 'edit'])
            ->middleware('permission:edit users')
            ->name('admin.users.edit');

        Route::put('/{user}', [UserController::class, 'update'])
            ->middleware('permission:edit users')
            ->name('admin.users.update');

        Route::delete('/{user}', [UserController::class, 'destroy'])
            ->middleware('permission:delete users')
            ->name('admin.users.destroy');
    });
});

// === ROUTE UNTUK OPERATOR ===
Route::middleware(['auth', 'verified', 'role:operator'])->group(function () {

    // Dashboard
    Route::get('/operator/dashboard', [DashboardController::class, 'operatorDashboard'])
        ->middleware('permission:view dashboard')
        ->name('operator.dashboard');

    // Booking
    Route::prefix('/booking')->middleware('permission:manage bookings')->group(function () {
        Route::get('/tersedia', [BookingController::class, 'tersedia'])->name('operator.mobil.tersedia');
        Route::get('/pending', [BookingController::class, 'pending'])->name('operator.mobil.pending');
        Route::get('/diterima', [BookingController::class, 'diterima'])->name('operator.mobil.diterima');
        Route::get('/ditolak', [BookingController::class, 'ditolak'])->name('operator.mobil.ditolak');
        Route::post('/update-car-status/{car}', [BookingController::class, 'updateStatus'])->name('operator.mobil.update.status');
    });

    // Profil
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
