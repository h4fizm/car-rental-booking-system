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
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
        ->middleware('permission:view dashboard')
        ->name('admin.dashboard');

    Route::resource('/admin/cars', CarController::class)
        ->middleware('permission:manage all cars');

    Route::get('/admin/monitoring', [CarController::class, 'monitor'])
        ->middleware('permission:monitor cars')
        ->name('cars.monitor');

    Route::resource('/admin/bookings', BookingController::class)
        ->middleware('permission:manage all bookings');

    Route::post('/admin/bookings/{booking}/approve', [BookingController::class, 'approve'])
        ->middleware('permission:approve booking')
        ->name('bookings.approve');

    Route::post('/admin/bookings/{booking}/reject', [BookingController::class, 'reject'])
        ->middleware('permission:reject booking')
        ->name('bookings.reject');

    Route::get('/admin/booking-history', [BookingController::class, 'allHistory'])
        ->middleware('permission:view all booking history')
        ->name('bookings.history');

    Route::resource('/admin/users', UserController::class)->middleware([
        'permission:view users|create users|edit users|delete users'
    ]);
});


// === ROUTE UNTUK OPERATOR ===
Route::middleware(['auth', 'verified', 'role:operator'])->group(function () {
    Route::get('/operator/dashboard', [DashboardController::class, 'operatorDashboard'])
        ->middleware('permission:view dashboard')
        ->name('operator.dashboard');

    Route::get('/operator/monitoring', [CarController::class, 'monitorOngoing'])
        ->middleware('permission:monitor ongoing cars')
        ->name('operator.cars.monitor');

    Route::resource('/operator/bookings', BookingController::class)
        ->except(['create', 'store'])
        ->middleware('permission:manage bookings');

    Route::post('/operator/bookings/{booking}/approve', [BookingController::class, 'approve'])
        ->middleware('permission:approve booking')
        ->name('operator.bookings.approve');

    Route::post('/operator/bookings/{booking}/reject', [BookingController::class, 'reject'])
        ->middleware('permission:reject booking')
        ->name('operator.bookings.reject');

    Route::get('/profile', [UserController::class, 'editOwn'])
        ->middleware('permission:edit own profile')
        ->name('operator.profile.edit');

    Route::patch('/profile', [UserController::class, 'updateOwn'])
        ->middleware('permission:edit own profile')
        ->name('operator.profile.update');
});

// First Link
Route::get('/', function () {
    return view('auth.login'); // Asumsinya file login.blade.php berada di resources/views/auth/
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
