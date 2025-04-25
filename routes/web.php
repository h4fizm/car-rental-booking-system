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
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('permission:view dashboard')
        ->name('user.dashboard');

    Route::get('/cars', [CarController::class, 'availableCars'])
        ->middleware('permission:view available cars')
        ->name('cars.available');

    Route::get('/booking', [BookingController::class, 'index'])
        ->middleware('permission:create booking')
        ->name('booking.index');

    Route::post('/booking', [BookingController::class, 'store'])
        ->middleware('permission:create booking')
        ->name('booking.store');

    Route::get('/booking/status', [BookingController::class, 'status'])
        ->middleware('permission:view booking status')
        ->name('booking.status');

    Route::get('/booking/history', [BookingController::class, 'history'])
        ->middleware('permission:view booking history')
        ->name('booking.history');

    Route::get('/profile', [UserController::class, 'editOwn'])
        ->middleware('permission:edit own profile')
        ->name('profile.edit');

    Route::patch('/profile', [UserController::class, 'updateOwn'])
        ->middleware('permission:edit own profile')
        ->name('profile.update');
});

// === ROUTE UNTUK ADMIN ===
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

    // Dashboard Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
        ->middleware('permission:view dashboard')
        ->name('admin.dashboard');

    // Route untuk halaman daftar mobil (khusus admin)
    Route::get('/admin/cars', [CarController::class, 'index'])
        ->middleware('permission:monitor cars|manage all cars')
        ->name('admin.cars.index');

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
