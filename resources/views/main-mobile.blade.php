<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Car Rental</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/image/favicon.png" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
  </head>

  <body class="bg-white text-black font-sans">
    <!-- Header -->
    <div class="bg-white text-black p-4">
      <div class="flex justify-between items-center">
        <!-- Logo -->
        <a
          href="index.html"
          class="font-extrabold text-2xl tracking-wide hover:opacity-80 transition"
        >
          Rental Car
        </a>

        <div class="flex items-center gap-3 relative">
          <!-- Pesan Button -->
          <a
            href="daftar_mobil.html"
            class="flex items-center gap-2 bg-black text-white px-4 py-2 rounded-full text-sm shadow-md"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-5 h-5"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M8.25 18.75a1.5 1.5 0 01-3 0m0 0a1.5 1.5 0 013 0m0 0h7.5m0 0a1.5 1.5 0 003 0m-3 0a1.5 1.5 0 013 0M4.5 18.75H3.375a.375.375 0 01-.375-.375V12.75a.75.75 0 01.75-.75h1.125m15 6.75h1.125a.375.375 0 00.375-.375V14.25a.75.75 0 00-.75-.75h-1.125M4.5 18.75v-9.75a.75.75 0 01.75-.75h13.5a.75.75 0 01.75.75v9.75"
              />
            </svg>
            Pesan
          </a>

          <!-- Dropdown -->
          <div class="relative">
            <button
              id="dropdownButton"
              class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 12h14M5 6h14M5 18h14"
                />
              </svg>
            </button>

            <!-- Dropdown Menu -->
            <div
              id="dropdownMenu"
              class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg hidden z-50"
            >
              <a
                href="index.html"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                >Beranda</a
              >
              <a
                href="daftar_mobil.html"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                >Daftar Mobil</a
              >
              <a
                href="riwayat.html"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                >Riwayat</a
              >
              <a
                href="profil.html"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                >Profile</a
              >
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <a href="#" 
                    class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
               </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Greeting -->
    <div class="px-4 mt-2">
      <!-- username dibatasi maksimal 20 karakter -->
      <h2 class="text-xl font-semibold">
        👋 Hai, {{ Str::limit($userName, 20) }}
      </h2> 
      <p class="text-sm text-gray-500 leading-relaxed">Selamat datang 😊💕</p>
    </div>


    <!-- Latest/Current Status -->
    <div class="px-4 py-2">
      <div class="bg-gray-100 rounded-2xl p-4 shadow-sm">
        <div class="space-y-1">
          <p class="text-sm text-gray-800 font-medium mb-1">
            Pemesanan Terakhir
          </p>
          <div class="bg-white border border-gray-200 rounded-xl p-3 shadow-sm">
            <div class="flex items-start gap-3">
              <img
                src="{{ asset('mobile/assets/image/sedan.png') }}"
                alt="Sedan"
                class="w-8 h-8 object-contain mt-1"
              />
              <div class="flex-1">
                <p class="text-sm font-semibold text-black">
                  Honda Civic Type-R - Sedan
                </p>
                <p class="text-xs text-gray-500">
                  08 Apr 2025, 09:00 - 10 Apr 2025, 20:00
                </p>
                <div class="flex items-center gap-2 mt-2">
                  <span
                    class="bg-red-100 text-red-700 px-3 py-0.5 rounded-full text-xs font-medium"
                    >Ditolak</span
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Services -->
    <div class="px-4 py-2">
      <div class="bg-gray-100 rounded-2xl p-4">
        <p class="text-sm text-gray-800 mb-1 font-medium">Pilih Kebutuhanmu</p>
        <p class="text-xs text-gray-500 mb-3 italic">
          Untuk kamu yang tahu kendaraan apa yang dibutuhkan.
        </p>

        <div class="grid grid-cols-4 gap-4 text-center text-xs text-black">
          <!-- SUV -->
          <a href="{{ route('car.suv') }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
            <img src="{{ asset('mobile/assets/image/suv.png') }}" alt="SUV" class="mx-auto mb-1 w-8 h-8 object-contain" />
            SUV
          </a>

          <!-- Sedan -->
          <a href="{{ route('car.sedan') }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
            <img src="{{ asset('mobile/assets/image/sedan.png') }}" alt="Sedan" class="mx-auto mb-1 w-8 h-8 object-contain" />
            Sedan
          </a>

          <!-- Pickup -->
          <a href="{{ route('car.pickup') }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
            <img src="{{ asset('mobile/assets/image/pickup.png') }}" alt="Pickup" class="mx-auto mb-1 w-8 h-8 object-contain" />
            Pickup
          </a>

          <!-- Minivan -->
          <a href="{{ route('car.minivan') }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
            <img src="{{ asset('mobile/assets/image/minivan.png') }}" alt="Minivan" class="mx-auto mb-1 w-8 h-8 object-contain" />
            Minivan
          </a>

          <!-- Truk Box -->
          <a href="{{ route('car.truckbox') }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
            <img src="{{ asset('mobile/assets/image/truckbox.png') }}" alt="Truk Box" class="mx-auto mb-1 w-8 h-8 object-contain" />
            Truk Box
          </a>

          <!-- Mobil Listrik -->
          <a href="{{ route('car.electric') }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
            <img src="{{ asset('mobile/assets/image/electric-car.png') }}" alt="Mobil Listrik" class="mx-auto mb-1 w-8 h-8 object-contain" />
            Mobil Listrik
          </a>

          <!-- Sport -->
          <a href="{{ route('car.sport') }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
            <img src="{{ asset('mobile/assets/image/sport-car.png') }}" alt="Sport Car" class="mx-auto mb-1 w-8 h-8 object-contain" />
            Sport
          </a>

          <!-- Luxury -->
          <a href="{{ route('car.luxury') }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
            <img src="{{ asset('mobile/assets/image/luxury.png') }}" alt="Luxury" class="mx-auto mb-1 w-8 h-8 object-contain" />
            Luxury
          </a>
        </div>
      </div>
    </div>

    <!-- Carousel Section -->
    <div class="px-4 py-2">
      <p class="text-sm text-gray-800 mb-1 font-medium">
        Rekomendasi Mobil Populer
      </p>
      <div class="swiper">
        <div class="swiper-wrapper">
          @foreach ($popularCars as $car)
            <a
              href="" 
              class="swiper-slide w-64 rounded-2xl overflow-hidden shadow-md bg-white mb-4 block"
            >
              <img
                src="{{ asset('storage/' . $car->photo) }}"
                alt="{{ $car->name }}"
                class="w-full h-36 object-cover"
              />
              <div class="p-3">
                <p class="text-sm font-semibold">{{ $car->name }}</p>
                <p class="text-xs text-gray-500">Mulai dari Rp {{ number_format($car->price, 0, ',', '.') }}/hari</p>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Favorite Car Section -->
    <div class="px-4 py-2 pb-8">
      <p class="text-sm text-gray-800 mb-5 font-medium">
        Pilihan Mobil Favorit
      </p>
      <div class="grid grid-cols-1 gap-5">
        @foreach ($favoriteCars as $car)
          <a
            href=""
            class="block bg-gray-100 rounded-xl shadow overflow-hidden hover:shadow-md transition"
          >
            <img
              src="{{ asset('storage/' . $car->photo) }}"
              alt="{{ $car->name }}"
              class="w-full h-40 object-cover"
            />
            <div class="p-4">
              <p class="text-sm font-semibold">{{ $car->name }}</p>
              <p class="text-xs text-gray-500">{{ $car->type->name ?? '-' }}</p>
            </div>
          </a>
        @endforeach
      </div>
    </div>

    <!-- Footer Info -->
    <div class="bg-gray-900 text-white text-xs px-6 py-5 rounded-t-2xl mb-16">
      <div class="space-y-2">
        <div>
          <p class="font-semibold">Hubungi Kami</p>
        </div>

        <a href="index.html" class="flex items-start gap-2 hover:text-gray-300">
          <!-- Icon -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4 mt-0.5 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M16.72 11.06a2.37 2.37 0 00.53-2.46l-1.5-5a2.5 2.5 0 00-2.94-1.74 35.57 35.57 0 00-8.82 3.63 35.64 35.64 0 00-3.63 8.82 2.5 2.5 0 001.74 2.94l5 1.5a2.37 2.37 0 002.46-.53l1.84-1.84a1.5 1.5 0 012.12 0l3.54 3.54a1.5 1.5 0 002.12-2.12l-3.54-3.54a1.5 1.5 0 010-2.12z"
            />
          </svg>
          <p>+62 812-3456-7890</p>
        </a>

        <a href="index.html" class="flex items-start gap-2 hover:text-gray-300">
          <!-- Icon -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4 mt-0.5 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M16 12a4 4 0 00-8 0m8 0v6m-8-6v6m0 0H5a2 2 0 01-2-2v-2m18 4h-3m0 0v-6a4 4 0 00-8 0v6"
            />
          </svg>
          <p>support@mobilrental.co.id</p>
        </a>

        <a href="index.html" class="flex items-start gap-2 hover:text-gray-300">
          <!-- Icon -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4 mt-0.5 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17.657 16.657L13.414 12.414a4 4 0 10-1.414 1.414l4.243 4.243a1 1 0 001.414-1.414z"
            />
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M10 14a6 6 0 100-12 6 6 0 000 12z"
            />
          </svg>
          <p>Jl. Merdeka No. 10, Jakarta Pusat, Indonesia</p>
        </a>
      </div>
    </div>

    <!-- Bottom Navigation -->
    <nav
      class="fixed bottom-0 left-0 right-0 bg-white bg-opacity-90 backdrop-blur text-black border-t border-gray-200 shadow-md flex justify-around py-1.5 z-50"
    >
      <!-- Beranda Active -->
      <a
        href="index.html"
        class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black bg-gray-300 px-2 py-1 transition rounded-md shadow"
      >
        <svg
          class="w-5 h-5"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 9.75L12 3l9 6.75M4.5 10.5V20.25h15V10.5"
          />
        </svg>
        Beranda
      </a>

      <!-- Mobil -->
      <a
        href="daftar_mobil.html"
        class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md"
      >
        <svg
          class="w-5 h-5"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 13l2-5h14l2 5M5 13v5m14-5v5M7.5 18.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM16.5 18.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
          />
        </svg>
        Daftar Mobil
      </a>

      <!-- Riwayat -->
      <a
        href="riwayat.html"
        class="flex flex-col items-center justify-center w-16 gap-0.5 text-[10px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md"
      >
        <svg
          class="w-5 h-5"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 5h6M9 3h6a2 2 0 012 2v2H7V5a2 2 0 012-2zM5 9h14M5 13h14M5 17h14"
          />
        </svg>
        Riwayat
      </a>

      <!-- Profil -->
      <a
        href="profil.html"
        class="flex flex-col items-center justify-center w-16 gap-0.5 text-[10px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md"
      >
        <svg
          class="w-5 h-5"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M16 14a4 4 0 01-8 0m8 0a4 4 0 00-8 0m8 0v2a4 4 0 01-8 0v-2m4-6a4 4 0 100-8 4 4 0 000 8z"
          />
        </svg>
        Profil
      </a>
    </nav>

    <!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('mobile/assets/js/script.js') }}"></script>
  </body>
</html>
