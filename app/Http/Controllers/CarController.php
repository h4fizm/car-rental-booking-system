<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return view('menu.table-car'); // Sesuaikan lokasi blade-nya
    }
}
