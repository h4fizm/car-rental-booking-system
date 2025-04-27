@extends('main')
@section('title', 'Edit Mobil')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Informasi Mobil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{ $car->name }}</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-car me-1"></i> Form Edit Mobil
            </div>
            <div class="card-body">
                <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama Mobil --}}
                    <div class="mb-3">
                        <label for="nama_mobil" class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="{{ old('nama_mobil', $car->name) }}" required>
                    </div>

                    {{-- Kategori Mobil --}}
                    <div class="mb-3">
                        <label for="kategori_mobil" class="form-label">Kategori Mobil</label>
                        <select class="form-select" id="kategori_mobil" name="kategori_mobil" required>
                            <option value="">-- Pilih Kategori --</option>
                            @php
                                $kategoriOptions = ['SUV', 'Sedan', 'Pickup', 'Minivan', 'TruckBox', 'Mobil Listrik', 'Sport', 'Luxury'];
                                $currentKategori = $car->type ? $car->type->name : '';
                            @endphp
                            @foreach ($kategoriOptions as $kategori)
                                <option value="{{ $kategori }}" {{ $currentKategori == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Harga Sewa Per Hari --}}
                    <div class="mb-3">
                        <label for="harga_sewa" class="form-label">Harga Sewa per Hari (Rp)</label>
                        <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" value="{{ old('harga_sewa', $car->price) }}" min="0" required>
                    </div>

                    {{-- Deskripsi Mobil --}}
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Mobil</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" maxlength="300" required>{{ old('deskripsi', $car->description) }}</textarea>
                        <small class="text-muted">Maksimal 300 karakter</small>
                    </div>

                    {{-- Upload Foto Mobil --}}
                    <div class="mb-3">
                        <label for="foto_mobil" class="form-label">Upload Foto Mobil (Optional)</label>
                        <input class="form-control" type="file" id="foto_mobil" name="foto_mobil" accept="image/*">
                        @if ($car->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $car->photo) }}" alt="Foto Mobil" width="150">
                            </div>
                        @endif
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
@endsection
