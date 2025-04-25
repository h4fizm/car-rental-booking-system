<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        // Kirim data ke view
        return view('menu.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalUsersRole',
            'totalOperators'
        ));
    }

    public function operatorDashboard()
    {
        // Menghitung jumlah user berdasarkan role
        $totalUsers = User::count();
        $totalAdmins = User::role('admin')->count();
        $totalUsersRole = User::role('user')->count();
        $totalOperators = User::role('operator')->count();

        // Kirim data ke view
        return view('menu.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalUsersRole',
            'totalOperators'
        ));
    }
}

