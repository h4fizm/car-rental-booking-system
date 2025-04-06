<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Untuk admin: manajemen user
    public function index()
    {
        echo "<h1>👥 Halaman Manajemen User</h1>";
        echo "<p>Ini adalah halaman untuk mengelola user (Create, Read, Update, Delete).</p>";
    }

    public function create()
    {
        echo "<h1>➕ Tambah User Baru</h1>";
    }

    public function store(Request $request)
    {
        echo "<h1>📝 Proses Simpan User Baru</h1>";
    }

    public function show($id)
    {
        echo "<h1>👁️ Detail User ID: {$id}</h1>";
    }

    public function edit($id)
    {
        echo "<h1>✏️ Edit User ID: {$id}</h1>";
    }

    public function update(Request $request, $id)
    {
        echo "<h1>🔄 Proses Update User ID: {$id}</h1>";
    }

    public function destroy($id)
    {
        echo "<h1>🗑️ Hapus User ID: {$id}</h1>";
    }

    // Untuk USER dan OPERATOR: Edit dan update profil sendiri
    public function editOwn()
    {
        echo "<h1>🙋‍♂️ Edit Profil Saya</h1>";
        echo "<p>Halaman ini digunakan untuk mengedit informasi profil pribadi pengguna.</p>";
    }

    public function updateOwn(Request $request)
    {
        echo "<h1>✅ Simpan Perubahan Profil</h1>";
    }
}
