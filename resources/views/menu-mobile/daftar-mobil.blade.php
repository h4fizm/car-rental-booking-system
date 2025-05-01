@extends('main-mobile')
@section('title', 'Laman Daftar Mobil')
@section('content')
    <!-- Greeting -->
    <div class="px-4 mt-2">
      <h2 class="text-xl font-semibold flex items-center gap-2">
        🚗 Pilihan Mobil Terbaik Untukmu
      </h2>
      <p class="text-sm text-gray-500 leading-relaxed mt-1">
        Temukan mobil yang pas buat kebutuhanmu ✨
      </p>
      <!-- Search Bar with Icon -->
      <div class="mt-4 relative">
        <span
          class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
        >
          <svg
            class="h-5 w-5 text-gray-400"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z"
            />
          </svg>
        </span>
        <input
          type="text"
          name="search"
          placeholder="Cari berdasarkan nama, jenis kendaraan, atau tipe mobil..."
          class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-black"
        />
      </div>
    </div>

    <!-- Filter Section -->
    <div class="p-4 space-y-4">
      <div>
        <label class="block mb-3 font-medium text-sm">Jenis Mobil</label>
        <div class="grid grid-cols-4 gap-2 text-center text-xs">
          <button
            class="bg-gray-100 rounded-full px-2 py-1 hover:bg-black hover:text-white"
          >
            SUV
          </button>
          <button
            class="bg-gray-100 rounded-full px-2 py-1 hover:bg-black hover:text-white"
          >
            Sedan
          </button>
          <button
            class="bg-gray-100 rounded-full px-2 py-1 hover:bg-black hover:text-white"
          >
            Sport
          </button>
          <button
            class="bg-gray-100 rounded-full px-2 py-1 hover:bg-black hover:text-white"
          >
            Pickup
          </button>
          <button
            class="bg-gray-100 rounded-full px-2 py-1 hover:bg-black hover:text-white"
          >
            Minivan
          </button>
          <button
            class="bg-gray-100 rounded-full px-2 py-1 hover:bg-black hover:text-white"
          >
            Truckbox
          </button>
          <button
            class="bg-gray-100 rounded-full px-2 py-1 hover:bg-black hover:text-white"
          >
            Listrik
          </button>
          <button
            class="bg-gray-100 rounded-full px-2 py-1 hover:bg-black hover:text-white"
          >
            Luxury
          </button>
        </div>
      </div>

      <div>
        <label class="block mb-1 font-medium text-sm">Range Harga (Rp)</label>
        <input
          type="range"
          min="100000"
          max="2000000"
          step="100000"
          class="w-full"
        />
        <div class="text-xs flex justify-between mt-1 text-gray-500">
          <span>100rb</span>
          <span>2jt</span>
        </div>
      </div>
    </div>

    <!-- Favorite Car Section -->
    <div class="px-4 py-2 pb-8">
      <p class="text-sm text-gray-800 mb-5 font-medium">
        Pilihan Mobil Favorit
      </p>
      <div class="grid grid-cols-1 gap-5">
        <!-- Card 1 -->
        <a
          href="mobil1.html"
          class="block bg-gray-100 rounded-xl shadow overflow-hidden hover:shadow-md transition"
        >
          <img
            src="assets/image/1.png"
            alt="Toyota Avanza"
            class="w-full h-40 object-cover"
          />
          <div class="p-4">
            <p class="text-sm font-semibold">Toyota Fortuner</p>
            <p class="text-xs text-gray-500">SUV</p>
          </div>
        </a>

        <!-- Card 2 -->
        <a
          href="mobil2.html"
          class="block bg-gray-100 rounded-xl shadow overflow-hidden hover:shadow-md transition"
        >
          <img
            src="assets/image/2.png"
            alt="Honda Brio"
            class="w-full h-40 object-cover"
          />
          <div class="p-4">
            <p class="text-sm font-semibold">Mitsubishi Pajero</p>
            <p class="text-xs text-gray-500">SUV</p>
          </div>
        </a>

        <!-- Card 3 -->
        <a
          href="mobil3.html"
          class="block bg-gray-100 rounded-xl shadow overflow-hidden hover:shadow-md transition"
        >
          <img
            src="assets/image/3.png"
            alt="Mitsubishi Xpander"
            class="w-full h-40 object-cover"
          />
          <div class="p-4">
            <p class="text-sm font-semibold">Honda CRV</p>
            <p class="text-xs text-gray-500">SUV</p>
          </div>
        </a>
      </div>
    </div>

    <!-- Carousel Section -->
    <div class="px-4 py-2">
      <p class="text-sm text-gray-800 mb-1 font-medium">
        Rekomendasi Mobil Populer
      </p>
      <div class="swiper">
        <div class="swiper-wrapper">
          <a
            href="mobil1.html"
            class="swiper-slide w-64 rounded-2xl overflow-hidden shadow-md bg-white mb-4 block"
          >
            <img
              src="assets/image/1.png"
              alt="Car 1"
              class="w-full h-36 object-cover"
            />
            <div class="p-3">
              <p class="text-sm font-semibold">Toyota Fortuner</p>
              <p class="text-xs text-gray-500">Mulai dari Rp 750.000/hari</p>
            </div>
          </a>

          <a
            href="mobil2.html"
            class="swiper-slide w-64 rounded-2xl overflow-hidden shadow-md bg-white block"
          >
            <img
              src="assets/image/2.png"
              alt="Car 1"
              class="w-full h-36 object-cover"
            />
            <div class="p-3">
              <p class="text-sm font-semibold">Mitsubishi Pajero</p>
              <p class="text-xs text-gray-500">Mulai dari Rp 1.200.000/hari</p>
            </div>
          </a>

          <a
            href="mobil3.html"
            class="swiper-slide w-64 rounded-2xl overflow-hidden shadow-md bg-white block"
          >
            <img
              src="assets/image/3.png"
              alt="Car 1"
              class="w-full h-36 object-cover"
            />
            <div class="p-3">
              <p class="text-sm font-semibold">Honda CRV</p>
              <p class="text-xs text-gray-500">Mulai dari Rp 1.000.000/hari</p>
            </div>
          </a>

          <a
            href="mobil3.html"
            class="swiper-slide w-64 rounded-2xl overflow-hidden shadow-md bg-white block"
          >
            <img
              src="assets/image/3.png"
              alt="Car 2"
              class="w-full h-36 object-cover"
            />
            <div class="p-3">
              <p class="text-sm font-semibold">Toyota Fortuner</p>
              <p class="text-xs text-gray-500">Mulai dari Rp 450.000/hari</p>
            </div>
          </a>

          <a
            href="mobil1.html"
            class="swiper-slide w-64 rounded-2xl overflow-hidden shadow-md bg-white block"
          >
            <img
              src="assets/image/1.png"
              alt="Car 3"
              class="w-full h-36 object-cover"
            />
            <div class="p-3">
              <p class="text-sm font-semibold">Toyota Fortuner</p>
              <p class="text-xs text-gray-500">Mulai dari Rp 1.500.000/hari</p>
            </div>
          </a>
        </div>
      </div>
    </div>
@endsection