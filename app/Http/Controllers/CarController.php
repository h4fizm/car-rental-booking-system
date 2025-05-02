<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('type')->get();
        return view('menu.table-car', compact('cars'));
    }

    public function create()
    {
        return view('menu.create-car');
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'kategori_mobil' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric|min:0',
            'deskripsi' => 'required|string|max:300',
            'foto_mobil' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
        ]);

        // Simpan foto mobil
        $path = $request->file('foto_mobil')->store('cars', 'public');

        // Cari ID kategori mobil (type_id) dari tabel cars_types
        $type = CarsType::where('name', $validated['kategori_mobil'])->first();
        if (!$type) {
            return redirect()->back()->with('error', 'Kategori mobil tidak ditemukan.');
        }

        // Simpan data mobil
        Car::create([
            'name' => $validated['nama_mobil'],
            'price' => $validated['harga_sewa'],
            'description' => $validated['deskripsi'],
            'photo' => $path,
            'type_id' => $type->id,
            'status' => null,
            'start_rental' => null,
            'end_rental' => null,
        ]);

        return redirect()->route('admin.cars.index')->with('success', 'Data mobil berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('menu.edit-car', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        // Validasi inputan
        $validated = $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'kategori_mobil' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric|min:0',
            'deskripsi' => 'required|string|max:300',
            'foto_mobil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update foto mobil jika ada file baru
        if ($request->hasFile('foto_mobil')) {
            if ($car->photo) {
                Storage::disk('public')->delete($car->photo);
            }
            $path = $request->file('foto_mobil')->store('cars', 'public');
            $car->photo = $path;
        }

        // Cari ID kategori
        $type = CarsType::where('name', $validated['kategori_mobil'])->first();
        if (!$type) {
            return redirect()->back()->with('error', 'Kategori mobil tidak ditemukan.');
        }

        // Update data mobil
        $car->name = $validated['nama_mobil'];
        $car->price = $validated['harga_sewa'];
        $car->description = $validated['deskripsi'];
        $car->type_id = $type->id;
        $car->save();

        return redirect()->route('admin.cars.index')->with('success', 'Data mobil berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        // Hapus foto dari storage
        if ($car->photo) {
            Storage::disk('public')->delete($car->photo);
        }

        // Hapus data mobil dari database
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Data mobil berhasil dihapus.');
    }
    public function preview($id)
    {
        $car = Car::with('type')->findOrFail($id);

        return view('menu.preview-car', compact('car'));
    }
    public function showAvailableCars()
    {
        $types = CarsType::all();

        // Ambil semua mobil untuk ditampilkan di daftar
        $allCars = Car::with('type')->get();

        // Mobil favorit (acak 3 mobil saja, hanya untuk highlight)
        if (!session()->has('mobilFavorit')) {
            $mobilFavorit = Car::inRandomOrder()->limit(3)->get();
            session(['mobilFavorit' => $mobilFavorit]);
        } else {
            $mobilFavorit = session('mobilFavorit');
        }

        // Mobil populer (acak 5 mobil untuk carousel)
        if (!session()->has('mobilPopuler')) {
            $mobilPopuler = Car::inRandomOrder()->limit(5)->get();
            session(['mobilPopuler' => $mobilPopuler]);
        } else {
            $mobilPopuler = session('mobilPopuler');
        }

        return view('menu-mobile.daftar-mobil', compact('types', 'allCars', 'mobilFavorit', 'mobilPopuler'));
    }


    public function showByCategory($category)
    {
        $cars = Car::whereHas('type', function ($query) use ($category) {
            $query->where('name', $category);
        })->get();

        return view('menu-mobile.kategori-mobil', compact('cars', 'category'));
    }


}
