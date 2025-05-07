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

        // Hitung harga total
        $startDate = Carbon::parse($request->start_date . ' ' . $request->start_time);
        $endDate = Carbon::parse($request->end_date . ' ' . $request->end_time);
        $pricePerDay = $car->price;
        $days = $startDate->diffInDays($endDate) + 1;
        $totalPrice = $days * $pricePerDay;

        // Simpan order ke database
        $order = Order::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'description' => $request->description,
            'price' => $totalPrice,
            'start_date' => $startDate->toDateString(),
            'end_date' => $endDate->toDateString(),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        // Update data mobil
        $car->update([
            'start_rental' => $startDate,
            'end_rental' => $endDate,
            'status' => 'pending',
        ]);

        return redirect()->route('user.history', $car->id)->with('success', 'Pemesanan berhasil!');
    }

    public function riwayat()
    {
        date_default_timezone_set('Asia/Jakarta');
        \Carbon\Carbon::setLocale('id');

        $user = auth()->user();

        $orders = Order::with(['car.type', 'user']) // Tambah relasi user
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $carIcons = [
            'suv' => 'suv.png',
            'sedan' => 'sedan.png',
            'pickup' => 'pickup.png',
            'minivan' => 'minivan.png',
            'truckbox' => 'truckbox.png',
            'mobil listrik' => 'electric-car.png',
            'sport' => 'sport-car.png',
            'luxury' => 'luxury.png'
        ];

        return view('menu-mobile.riwayat', [
            'orders' => $orders,
            'carIcons' => $carIcons,
        ]);
    }


}
