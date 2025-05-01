@extends('main-mobile')
@section('title', 'Riwayat Booking')
@section('content')
<!-- Riwayat Rental Section -->
<div class="p-4 space-y-4 mb-16">
    <h2 class="text-md font-semibold mb-2">Riwayat Pemesanan</h2>

    <!-- Search Bar with Icon -->
    <div class="mb-4 relative">
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
        placeholder="Cari berdasarkan nama, status, atau tipe mobil..."
        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-black"
    />
    </div>

    <!-- Card 1 -->
    <div
    class="bg-white rounded-2xl shadow p-4 flex items-start gap-4 border border-gray-200"
    >
    <!-- Avatar Mobil -->
    <div
        class="w-12 h-12 rounded-full overflow-hidden border border-gray-300"
    >
        <img
        src="{{ asset('mobile/assets/image/suv.png') }}"
        alt="SUV"
        class="object-cover w-full h-full"
        />
    </div>

    <!-- Info Pemesanan -->
    <div class="flex-1">
        <div class="flex justify-between items-start">
        <div>
            <h3 class="font-semibold text-md">Toyota Fortuner</h3>
            <p class="text-xs text-gray-500">Tipe : SUV</p>
        </div>
        <span class="text-xs font-bold text-yellow-600">Pending</span>
        </div>

        <div class="mt-2 space-y-1 text-sm text-gray-700">
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
            <p>Diajukan : Senin, 07 Apr 2025 - 14:30 WIB</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
            <p>Peminjaman : 08 Apr – 10 Apr 2025, pukul 09:00 – 18:00 WIB</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
            <p>Atas nama : Farel Hafiz</p>
        </div>
        </div>
    </div>
    </div>

    <!-- Card 2 -->
    <div
    class="bg-white rounded-2xl shadow p-4 flex items-start gap-4 border border-gray-200 mt-4"
    >
    <div
        class="w-12 h-12 rounded-full overflow-hidden border border-gray-300"
    >
        <img
        src="{{ asset('mobile/assets/image/luxury.png') }}"
        alt="Luxury"
        class="object-cover w-full h-full"
        />
    </div>

    <div class="flex-1">
        <div class="flex justify-between items-start">
        <div>
            <h3 class="font-semibold text-md">Mercedes Benz C-Class</h3>
            <p class="text-xs text-gray-500">Tipe : Luxury</p>
        </div>
        <span class="text-xs font-bold text-green-600">Disetujui</span>
        </div>

        <div class="mt-2 space-y-1 text-sm text-gray-700">
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
            <p>Diajukan : Minggu, 06 Apr 2025 - 11:00 WIB</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
            <p>Peminjaman : 09 Apr – 12 Apr 2025, pukul 08:00 – 17:00 WIB</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
            <p>Atas nama : Rafi Aditya</p>
        </div>
        </div>
    </div>
    </div>

    <!-- Card 3 -->
    <div
    class="bg-white rounded-2xl shadow p-4 flex items-start gap-4 border border-gray-200 mt-4"
    >
    <div
        class="w-12 h-12 rounded-full overflow-hidden border border-gray-300"
    >
        <img
        src="{{ asset('mobile/assets/image/truckbox.png') }}"
        alt="Truckbox"
        class="object-cover w-full h-full"
        />
    </div>

    <div class="flex-1">
        <div class="flex justify-between items-start">
        <div>
            <h3 class="font-semibold text-md">Isuzu Traga Box</h3>
            <p class="text-xs text-gray-500">Tipe : Truckbox</p>
        </div>
        <span class="text-xs font-bold text-red-600">Ditolak</span>
        </div>

        <div class="mt-2 space-y-1 text-sm text-gray-700">
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
            <p>Diajukan : Sabtu, 05 Apr 2025 - 09:45 WIB</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
            <p>Peminjaman : 07 Apr – 08 Apr 2025, pukul 10:00 – 15:00 WIB</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
            <p>Atas nama : Dinda Salma</p>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection