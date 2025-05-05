<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua user beserta role-nya
        $users = User::with('roles')->get();

        return view('menu.table-user', compact('users'));
    }

    public function create()
    {
        // Menampilkan form untuk tambah user
        $roles = Role::all(); // Ambil semua role yang ada
        return view('menu.create-user', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validasi inputan user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Menambahkan role yang dipilih
        $user->assignRole($request->role);

        // Redirect ke halaman user setelah berhasil menyimpan
        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        // Ambil semua role yang ada untuk dipilih
        $roles = Role::all();

        return view('menu.edit-user', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi inputan user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Menambahkan role yang dipilih
        $user->syncRoles($request->role); // Sinkronisasi role baru

        // Redirect ke halaman user setelah berhasil menyimpan
        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }
    public function destroy(User $user)
    {
        // Pastikan user yang dihapus bukan user yang sedang login
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }
        // Hapus user
        $user->delete();

        // Redirect kembali ke halaman daftar user dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
