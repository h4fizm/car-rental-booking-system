<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    // ============================
    // === USER BOOKING ROUTES ===
    // ============================

    public function index()
    {
        echo "<h1>📅 Halaman Booking</h1>";
        echo "<p>Ini adalah halaman untuk melakukan booking kendaraan. (User)</p>";
    }

    public function store(Request $request)
    {
        echo "<h1>📥 Simpan Booking</h1>";
        echo "<p>Data booking telah dikirim. (User)</p>";
    }

    public function status()
    {
        echo "<h1>📊 Status Booking</h1>";
        echo "<p>Ini adalah halaman untuk melihat status booking Anda. (User)</p>";
    }

    public function history()
    {
        echo "<h1>📜 Riwayat Booking</h1>";
        echo "<p>Ini adalah halaman riwayat booking yang sudah dilakukan. (User)</p>";
    }

    // =============================
    // === ADMIN BOOKING ROUTES ===
    // =============================

    public function allHistory()
    {
        echo "<h1>🗂️ Riwayat Semua Booking</h1>";
        echo "<p>Ini adalah halaman riwayat semua booking oleh admin. (Admin)</p>";
    }

    public function approve($bookingId)
    {
        echo "<h1>✅ Booking Disetujui</h1>";
        echo "<p>Booking dengan ID {$bookingId} telah disetujui. (Admin/Operator)</p>";
    }

    public function reject($bookingId)
    {
        echo "<h1>❌ Booking Ditolak</h1>";
        echo "<p>Booking dengan ID {$bookingId} telah ditolak. (Admin/Operator)</p>";
    }

    // Resource Controller Methods (Admin & Operator)

    public function create()
    {
        echo "<h1>➕ Form Tambah Booking</h1>";
    }

    public function show($id)
    {
        echo "<h1>🔍 Detail Booking ID: {$id}</h1>";
    }

    public function edit($id)
    {
        echo "<h1>✏️ Form Edit Booking ID: {$id}</h1>";
    }

    public function update(Request $request, $id)
    {
        echo "<h1>♻️ Update Booking ID: {$id}</h1>";
    }

    public function destroy($id)
    {
        echo "<h1>🗑️ Hapus Booking ID: {$id}</h1>";
    }
}
