<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        echo "<h1>📅 Halaman Booking</h1>";
        echo "<p>Ini adalah halaman untuk melakukan booking kendaraan.</p>";
    }
}
