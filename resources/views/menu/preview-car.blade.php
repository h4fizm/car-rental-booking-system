@extends('main')
@section('title', $car->name)

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Preview Mobil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{ $car->name }} / {{ $car->type->name }}</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3 text-center">
                    @if ($car->photo)
                        <img src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->name }}" style="max-width: 300px;" class="img-fluid rounded">
                    @else
                        <p>Tidak ada foto mobil.</p>
                    @endif
                </div>

                <h2 class="mb-2">{{ $car->name }}</h2>
                <p><strong>Kategori:</strong> {{ $car->type->name }}</p>
                <p><strong>Harga Sewa:</strong> Rp {{ number_format($car->price, 0, ',', '.') }}</p>
                <p><strong>Deskripsi:</strong> {{ $car->description }}</p>
                <p><strong>Status:</strong> {{ $car->status ?? 'Tersedia' }}</p>
                <p><strong>Tanggal Peminjaman:</strong> 
                    @if ($car->start_rental && $car->end_rental)
                        {{ \Carbon\Carbon::parse($car->start_rental)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($car->end_rental)->translatedFormat('d F Y') }}
                    @else
                        Belum dipinjam
                    @endif
                </p>

                <div class="mt-4">
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Kembali ke Daftar Mobil</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
