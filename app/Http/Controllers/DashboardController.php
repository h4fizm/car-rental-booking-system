<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        echo "<h1>Halaman User Dashboard</h1>";
    }
    public function adminDashboard()
    {
        return view('menu.dashboard');
    }

    public function operatorDashboard()
    {
        echo "<h1>Halaman Operator Dashboard</h1>";
    }

}
