<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use App\Models\Order;
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
        $user = auth()->user();
        $userName = $user->name;

        // Ambil order terakhir
        $latestOrder = Order::with(['car.type'])
            ->where('user_id', $user->id)
            ->latest()
            ->first();

        // Mobil populer (status tersedia atau ditolak)
        if (!session()->has('popularCars')) {
            $popularCars = Car::whereIn('status', ['tersedia'])
                ->inRandomOrder()
                ->limit(5)
                ->get();
            session(['popularCars' => $popularCars]);
        } else {
            $popularCars = session('popularCars');
        }

        // Mobil favorit (status tersedia atau ditolak)
        if (!session()->has('favoriteCars')) {
            $favoriteCars = Car::whereIn('status', ['tersedia'])
                ->inRandomOrder()
                ->limit(3)
                ->get();
            session(['favoriteCars' => $favoriteCars]);
        } else {
            $favoriteCars = session('favoriteCars');
        }

        return view('menu-mobile.dashboard', compact(
            'userName',
            'popularCars',
            'favoriteCars',
            'latestOrder'
        ));
    }

}
