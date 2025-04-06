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


// === ROUTE UNTUK USER (STAFF / PEGAWAI) ===
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    Route::get('/cars', [CarController::class, 'availableCars'])->name('cars.available');

    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/status', [BookingController::class, 'status'])->name('booking.status');
    Route::get('/booking/history', [BookingController::class, 'history'])->name('booking.history');

    Route::get('/profile', [UserController::class, 'editOwn'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'updateOwn'])->name('profile.update');
});

// === ROUTE UNTUK ADMIN ===
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::resource('/admin/cars', CarController::class);
    Route::get('/admin/monitoring', [CarController::class, 'monitor'])->name('cars.monitor');
    
    Route::resource('/admin/bookings', BookingController::class);
    Route::post('/admin/bookings/{booking}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
    Route::post('/admin/bookings/{booking}/reject', [BookingController::class, 'reject'])->name('bookings.reject');
    Route::get('/admin/booking-history', [BookingController::class, 'allHistory'])->name('bookings.history');


    Route::resource('/admin/users', UserController::class);
});

// === ROUTE UNTUK OPERATOR ===
Route::middleware(['auth', 'verified', 'role:operator'])->group(function () {
    Route::get('/operator/dashboard', [DashboardController::class, 'operatorDashboard'])->name('operator.dashboard');

    Route::get('/operator/monitoring', [CarController::class, 'monitorOngoing'])->name('operator.cars.monitor');

    Route::resource('/operator/bookings', BookingController::class)->except(['create', 'store']);
    Route::post('/operator/bookings/{booking}/approve', [BookingController::class, 'approve'])->name('operator.bookings.approve');
    Route::post('/operator/bookings/{booking}/reject', [BookingController::class, 'reject'])->name('operator.bookings.reject');

    Route::get('/profile', [UserController::class, 'editOwn'])->name('operator.profile.edit');
    Route::patch('/profile', [UserController::class, 'updateOwn'])->name('operator.profile.update');
});

Route::get('/', function () {
    return view('welcome');
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
