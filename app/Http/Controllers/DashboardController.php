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
        echo "<h1>Halaman Admin Dashboard</h1>";
    }

    public function operatorDashboard()
    {
        echo "<h1>Halaman Operator Dashboard</h1>";
    }

}
