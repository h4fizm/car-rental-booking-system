<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        // Menghitung jumlah user berdasarkan role
        $totalUsers = User::count();
        $totalAdmins = User::role('admin')->count();
        $totalUsersRole = User::role('user')->count();
        $totalOperators = User::role('operator')->count();

        // Menghitung jumlah mobil berdasarkan status
        $totalCars = Car::count();
        $totalAvailableCars = Car::where('status', 'available')->count(); // status tersedia
        $totalPendingCars = Car::where('status', 'pending')->count(); // status pending
        $totalRejectedCars = Car::where('status', 'rejected')->count(); // status ditolak

        // Kirim data ke view
        return view('menu.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalUsersRole',
            'totalOperators',
            'totalCars',
            'totalAvailableCars',
            'totalPendingCars',
            'totalRejectedCars'
        ));
    }

    public function operatorDashboard()
    {
        // Menghitung jumlah user berdasarkan role
        $totalUsers = User::count();
        $totalAdmins = User::role('admin')->count();
        $totalUsersRole = User::role('user')->count();
        $totalOperators = User::role('operator')->count();

        // Menghitung jumlah mobil berdasarkan status
        $totalCars = Car::count();
        $totalAvailableCars = Car::where('status', 'available')->count(); // status tersedia
        $totalPendingCars = Car::where('status', 'pending')->count(); // status pending
        $totalRejectedCars = Car::where('status', 'rejected')->count(); // status ditolak

        // Kirim data ke view
        return view('menu.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalUsersRole',
            'totalOperators',
            'totalCars',
            'totalAvailableCars',
            'totalPendingCars',
            'totalRejectedCars'
        ));
    }
    public function userDashboard()
    {
        $userName = auth()->user()->name;
        $popularCars = Car::inRandomOrder()->limit(5)->get();
        $favoriteCars = Car::inRandomOrder()->limit(3)->get();

        return view('main-mobile', compact('userName', 'popularCars', 'favoriteCars'));
    }

}
