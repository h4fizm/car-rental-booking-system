@extends('main-mobile')

@section('title', 'Laman Daftar Mobil - ' . ucfirst($category))

@section('content')
<div class="px-4 mt-2">
    <h2 class="text-xl font-semibold flex items-center gap-2">
        🚗 Pilihan {{ ucfirst($category) }} Terbaik Untukmu
    </h2>
    <p class="text-sm text-gray-500 leading-relaxed mt-1">
        Temukan {{ strtolower($category) }} yang pas buat kebutuhanmu ✨
    </p>
</div>
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
            placeholder="Cari berdasarkan nama atau tipe mobil..."
            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-black"
        />
        </div>
    </div>

    <!-- Filter Category: Dropdown Harga -->
    <div class="px-4 mt-4">
        <label
        for="sortHarga"
        class="text-sm font-medium text-gray-700 block mb-3"
        >
        Urutkan berdasarkan
        </label>
        <select
        id="sortHarga"
        name="sortHarga"
        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-black"
        >
        <option value="termurah">Harga Terendah ke Tertinggi</option>
        <option value="termahal">Harga Tertinggi ke Terendah</option>
        </select>
    </div>

  <!-- Daftar Mobil -->
<div class="p-4 space-y-5 mb-5">
    @forelse ($cars as $car)
    <a href="{{ route('car.show', $car->id) }}" class="block">
        <div class="flex bg-gray-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
            <img src="{{ asset('storage/' . $car->image) }}" class="w-32 h-24 object-cover" alt="{{ $car->name }}" />
            <div class="p-3 flex-1">
                <p class="font-semibold text-base">{{ $car->name }}</p>
                <p class="text-xs text-gray-500">{{ ucfirst($category) }}</p>
                <p class="text-sm font-bold text-black mt-1">
                    Rp {{ number_format($car->price, 0, ',', '.') }}
                    <span class="text-xs font-normal text-gray-500">/ hari</span>
                </p>
            </div>
        </div>
    </a>
    @empty
    <p class="text-center text-sm text-gray-500">Belum ada mobil tersedia untuk kategori ini.</p>
    @endforelse
</div>
@endsection