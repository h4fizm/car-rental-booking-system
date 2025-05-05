<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Order;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index(Car $car)
    {
        return view('menu-mobile.checkout', [
            'car' => $car, // Kirim data mobil ke view
            'name' => $car->name,
            'category' => $car->type->name,
            'pricePerDay' => $car->price,
            'userName' => auth()->user()->name ?? '',
        ]);
    }

    public function store(Request $request, Car $car)
    {
        // Validasi input
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date|after_or_equal:start_date',
            'end_time' => 'required|date_format:H:i',
            'description' => 'nullable|string|max:255',
        ]);

        // Hitung harga total berdasarkan tanggal
        $startDate = Carbon::parse($request->start_date . ' ' . $request->start_time);
        $endDate = Carbon::parse($request->end_date . ' ' . $request->end_time);
        $pricePerDay = $car->price;
        $days = $startDate->diffInDays($endDate) + 1; // +1 karena termasuk hari pertama
        $totalPrice = $days * $pricePerDay;

        // Simpan data pesanan ke database
        Order::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'description' => $request->description, // Gantilah 'decription' dengan 'description'
            'price' => $totalPrice,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('user.history', $car->id)->with('success', 'Pemesanan berhasil!');
    }

    public function riwayat()
    {
        return view('menu-mobile.riwayat');
    }

}
