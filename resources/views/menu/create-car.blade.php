@extends('main')
@section('title', 'Tambah Mobil')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Mobil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Mobil Baru</li>
        </ol>

        {{-- Card Tambah Mobil --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-car me-1"></i> Form Tambah Mobil
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Nama Mobil --}}
                    <div class="mb-3">
                        <label for="nama_mobil" class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" placeholder="Masukkan nama mobil" required>
                    </div>

                    {{-- Kategori Mobil --}}
                    <div class="mb-3">
                        <label for="kategori_mobil" class="form-label">Kategori Mobil</label>
                        <select class="form-select" id="kategori_mobil" name="kategori_mobil" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="SUV">SUV</option>
                            <option value="Sedan">Sedan</option>
                            <option value="Pickup">Pickup</option>
                            <option value="Minivan">Minivan</option>
                            <option value="TruckBox">TruckBox</option>
                            <option value="Mobil Listrik">Mobil Listrik</option>
                            <option value="Sport">Sport</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                    </div>

                    {{-- Harga Sewa Per Hari --}}
                    <div class="mb-3">
                        <label for="harga_sewa" class="form-label">Harga Sewa per Hari (Rp)</label>
                        <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" placeholder="Masukkan harga sewa" min="0" required>
                    </div>

                    {{-- Deskripsi Mobil --}}
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Mobil</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi mobil" maxlength="300" required></textarea>
                        <small class="text-muted">Maksimal 300 karakter</small>
                    </div>

                    {{-- Upload Foto Mobil --}}
                    <div class="mb-3">
                        <label for="foto_mobil" class="form-label">Upload Foto Mobil</label>
                        <input class="form-control" type="file" id="foto_mobil" name="foto_mobil" accept="image/*" required>
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
