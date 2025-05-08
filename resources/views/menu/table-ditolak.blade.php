@extends('main')
@section('title', 'Daftar Mobil Status Ditolak')

@section('content')
<main class="container py-4">
    <h3 class="mb-4 fw-bold">Daftar Mobil Status Ditolak</h3>

    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
    @endphp

    <div class="row g-4">
        @forelse ($cars as $car)
        <div class="col-12">
            <div class="card shadow-sm h-100 d-flex flex-column">
                <h5 class="card-header">{{ $car->name }}</h5>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $car->type->name ?? 'Kategori Tidak Diketahui' }}</h6>
                        <p class="card-text">{{ $car->description }}</p>
                        <p class="card-text">
                            <strong>Tanggal Peminjaman:</strong><br>
                            @if ($car->start_rental && $car->end_rental)
                                {{ Carbon::parse($car->start_rental)->translatedFormat('l, j F') }} -
                                {{ Carbon::parse($car->end_rental)->translatedFormat('l, j F') }}
                            @else
                                Tanggal Peminjaman Tidak ada
                            @endif
                        </p>
                    </div>

                    <div class="mt-3 d-flex justify-content-end align-items-center gap-2">
                        @hasanyrole('admin|operator')
                            <form 
                                action="{{ 
                                    auth()->user()->hasRole('admin') 
                                        ? route('admin.mobil.update.status', $car->id) 
                                        : route('operator.mobil.update.status', $car->id) 
                                }}" 
                                method="POST" 
                                class="d-flex gap-2 align-items-center"
                            >
                                @csrf
                                <select name="status" class="form-select">
                                    @foreach (['Tersedia', 'Pending', 'Diterima', 'Ditolak'] as $status)
                                        <option value="{{ $status }}" {{ strtolower($car->status) === strtolower($status) ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-danger">Simpan</button>
                            </form>
                        @endhasanyrole
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Tidak ada mobil dengan status Ditolak.
            </div>
        </div>
        @endforelse
    </div>
</main>

@if (session('success'))
    <div class="alert alert-success mt-3 text-center">
        {{ session('success') }}
    </div>
@endif
@endsection
