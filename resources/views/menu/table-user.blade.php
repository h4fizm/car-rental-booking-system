@extends('main')
@section('title', 'Laman Profil')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manajamen User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Pengguna User</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-users me-1"></i> <!-- Ganti icon agar lebih relate -->
                    Daftar Pengguna
                </div>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah User
                </a>
            </div>
            <div class="card-body">
                <table id="userTable" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 5%; text-align: center;">No</th> <!-- Kolom No diperkecil -->
                            <th>Nama User</th>
                            <th>Email</th> <!-- Menambahkan kolom Email -->
                            <th style="width: 15%; text-align: center;">Role User</th> <!-- Kolom Role dipusatkan -->
                            <th style="width: 20%; text-align: center;">Aksi</th> <!-- Kolom Aksi diperkecil dan dipusatkan -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td> <!-- Menampilkan email -->
                                <td class="text-center">
                                   @php
                                        $role = $user->roles->pluck('name')->first();
                                        $badgeClass = match(strtolower($role)) {
                                            'admin' => 'bg-danger',
                                            'user' => 'bg-primary',
                                            'operator' => 'bg-success',
                                            default => 'bg-secondary',
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ $role }}</span>
                                </td>
                                <td class="text-center">
                                    <!-- Tombol Edit yang mengarah ke halaman edit berdasarkan ID user -->
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
