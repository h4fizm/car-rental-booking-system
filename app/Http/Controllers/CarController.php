<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    // Halaman informasi mobil yang tersedia (untuk admin & user)
    public function availableCars()
    {
        echo "<h1>📅 Halaman Car</h1>";
        echo "<p>Ini adalah halaman untuk melakukan Informasi Car. Untuk role admin dan user saja</p>";
    }

    // ========================
    // CRUD Mobil (Admin Only)
    // ========================

    // Menampilkan semua mobil
    public function index()
    {
        echo "<h1>🚗 Daftar Semua Mobil</h1>";
    }

    // Form tambah mobil
    public function create()
    {
        echo "<h1>➕ Form Tambah Mobil</h1>";
    }

    // Simpan mobil baru
    public function store(Request $request)
    {
        echo "<h1>📥 Simpan Mobil Baru</h1>";
    }

    // Tampilkan detail mobil
    public function show($id)
    {
        echo "<h1>🔍 Detail Mobil ID: {$id}</h1>";
    }

    // Form edit mobil
    public function edit($id)
    {
        echo "<h1>✏️ Form Edit Mobil ID: {$id}</h1>";
    }

    // Update data mobil
    public function update(Request $request, $id)
    {
        echo "<h1>♻️ Update Mobil ID: {$id}</h1>";
    }

    // Hapus mobil
    public function destroy($id)
    {
        echo "<h1>🗑️ Hapus Mobil ID: {$id}</h1>";
    }

    // Monitoring mobil berjalan (Admin Only)
    public function monitor()
    {
        echo "<h1>📡 Monitoring Mobil Berjalan</h1>";
    }

    // ========================
    // CRUD Mobil (Operator Only)
    // ========================

    // Menampilkan semua mobil
    public function monitorOngoing()
    {
        echo "<h1>🚗 Daftar Semua Mobil dilaman operator</h1>";
    }
}
