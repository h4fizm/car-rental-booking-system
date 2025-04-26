<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        // Ambil semua data mobil yang ada di database
        $cars = Car::with('type')->get(); // Mengambil data mobil beserta jenis mobil (type)

        // Kirim data mobil ke view
        return view('menu.table-car', compact('cars'));
    }

    public function create()
    {
        return view('menu.create-car');
    }
}
