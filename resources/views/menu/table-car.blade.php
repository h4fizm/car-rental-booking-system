@extends('main')
@section('title', 'Daftar Mobil')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manajemen Mobil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Mobil</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-car me-1"></i> Data Mobil
                </div>
                <a href="{{ route('admin.cars.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Mobil
                </a>
            </div>
            <div class="card-body">
                <table id="userTable" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 5%; text-align: center;">No</th>
                            <th>Tipe Mobil</th>
                            <th style="width: 15%; text-align: center;">Kategori Mobil</th>
                            <th style="width: 20%; text-align: center;">Tanggal Peminjaman</th>
                            <th style="width: 10%; text-align: center;">Status</th>
                            <th style="width: 25%; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $badgeColorsKategori = [
                                'SUV' => 'bg-success',
                                'Sedan' => 'bg-primary',
                                'Pickup' => 'bg-warning text-dark',
                                'Minivan' => 'bg-info text-dark',
                                'TruckBox' => 'bg-secondary',
                                'Mobil Listrik' => 'bg-warning text-white',
                                'Sport' => 'bg-danger',
                                'Luxury' => 'bg-dark',
                            ];

                            $badgeColorsStatus = [
                                'diterima' => 'bg-success',
                                'pending' => 'bg-warning text-dark',
                                'tersedia' => 'bg-secondary',
                                'ditolak' => 'bg-danger',
                                null => 'bg-muted', // Status null berarti belum ada peminjaman
                            ];
                        @endphp

                        @foreach ($cars as $index => $car)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $car->name }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $badgeColorsKategori[$car->type->name] ?? 'bg-secondary' }}">
                                        {{ $car->type->name }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if ($car->start_rental && $car->end_rental)
                                        {{ \Carbon\Carbon::parse($car->start_rental)->locale('id')->isoFormat('dddd, D MMMM') }} – 
                                        {{ \Carbon\Carbon::parse($car->end_rental)->locale('id')->isoFormat('dddd, D MMMM') }}
                                    @else
                                        <span class="text-dark">Belum ada peminjaman</span> <!-- Mengubah teks menjadi hitam -->
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge 
                                        @if ($car->status)
                                            {{ $badgeColorsStatus[$car->status] ?? 'bg-muted' }}
                                        @else
                                            bg-success text-white  <!-- Menambahkan kelas hitam untuk status null -->
                                        @endif
                                    ">
                                        {{ ucfirst($car->status ?? 'Tersedia') }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('admin.cars.preview', $car->id) }}" class="btn btn-sm btn-info">Preview</a>
                                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data mobil ini?')">
                                            Hapus
                                        </button>
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
