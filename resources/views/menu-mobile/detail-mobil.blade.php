@extends('main-mobile')
{{-- tambahkan ini nama merk mobilnya --}}
@section('title', 'Nama Merk Mobilnya')
@section('content')
<!-- Konten Utama -->
    <div class="max-w-md mx-auto px-4">
      <div class="relative mb-6">
        <!-- Tombol kembali -->
        <a
          href="index.html"
          class="absolute top-3 left-3 z-10 bg-white p-2 rounded-full shadow hover:bg-gray-100 transition"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-5 h-5 text-black"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15.75 19.5L8.25 12l7.5-7.5"
            />
          </svg>
        </a>

        <!-- Gambar Mobil -->
        <img
          src="assets/image/1.png"
          alt="Toyota Fortuner"
          class="w-full h-52 object-cover rounded-2xl shadow-sm"
        />
      </div>

      <!-- Informasi Mobil -->
      <div class="mb-4">
        <p class="text-sm text-gray-500 uppercase tracking-wide">SUV</p>
        <h1 class="text-2xl font-bold text-black mb-1">Toyota Fortuner</h1>
      </div>

      <!-- Deskripsi -->
      <div class="mb-6">
        <h2 class="text-md font-semibold mb-1">Deskripsi</h2>
        <p class="text-sm text-gray-700 leading-relaxed">
          Mitsubishi Pajero adalah SUV tangguh dengan desain elegan dan
          kenyamanan tingkat tinggi. Cocok untuk perjalanan keluarga maupun
          off-road.
        </p>
      </div>

      <!-- Tarif -->
      <div class="flex items-center justify-between mb-6">
        <p class="text-lg font-bold text-black">Rp 750.000 / hari</p>
      </div>
    </div>

    <!-- Tombol Bawah -->
    <div class="fixed bottom-0 left-0 right-0 bg-white shadow-md px-4 py-3">
      <a
        href="checkout_pemesanan.html"
        class="w-full block text-center py-2 rounded-xl bg-green-500 text-white font-semibold"
      >
        Sewa Sekarang
      </a>
    </div>
    @endsection