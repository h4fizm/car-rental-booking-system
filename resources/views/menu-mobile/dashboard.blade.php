@extends('main-mobile')
@section('title', 'Laman Dashboard')
@section('content')
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
    <a href="{{ route('user.car.category', ['category' => 'suv']) }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
        <img src="{{ asset('mobile/assets/image/suv.png') }}" alt="SUV" class="mx-auto mb-1 w-8 h-8 object-contain" />
        SUV
    </a>

    <!-- Sedan -->
    <a href="{{ route('user.car.category', ['category' => 'sedan']) }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
        <img src="{{ asset('mobile/assets/image/sedan.png') }}" alt="Sedan" class="mx-auto mb-1 w-8 h-8 object-contain" />
        Sedan
    </a>

    <!-- Pickup -->
    <a href="{{ route('user.car.category', ['category' => 'pickup']) }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
        <img src="{{ asset('mobile/assets/image/pickup.png') }}" alt="Pickup" class="mx-auto mb-1 w-8 h-8 object-contain" />
        Pickup
    </a>

    <!-- Minivan -->
    <a href="{{ route('user.car.category', ['category' => 'minivan']) }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
        <img src="{{ asset('mobile/assets/image/minivan.png') }}" alt="Minivan" class="mx-auto mb-1 w-8 h-8 object-contain" />
        Minivan
    </a>

    <!-- Truk Box -->
    <a href="{{ route('user.car.category', ['category' => 'truckbox']) }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
        <img src="{{ asset('mobile/assets/image/truckbox.png') }}" alt="Truk Box" class="mx-auto mb-1 w-8 h-8 object-contain" />
        Truk Box
    </a>

    <!-- Mobil Listrik -->
    <a href="{{ route('user.car.category', ['category' => 'mobil listrik']) }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
        <img src="{{ asset('mobile/assets/image/electric-car.png') }}" alt="Mobil Listrik" class="mx-auto mb-1 w-8 h-8 object-contain" />
        Mobil Listrik
    </a>

    <!-- Sport -->
    <a href="{{ route('user.car.category', ['category' => 'sport']) }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
        <img src="{{ asset('mobile/assets/image/sport-car.png') }}" alt="Sport Car" class="mx-auto mb-1 w-8 h-8 object-contain" />
        Sport
    </a>

    <!-- Luxury -->
    <a href="{{ route('user.car.category', ['category' => 'luxury']) }}" class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] text-black hover:text-black hover:bg-gray-300 px-2 py-1 transition rounded-md">
        <img src="{{ asset('mobile/assets/image/luxury.png') }}" alt="Luxury" class="mx-auto mb-1 w-8 h-8 object-contain" />
        Luxury
    </a>
</div>

    </div>
</div>

<!-- Carousel Section -->
<div class="px-4 py-2">
    <p class="text-sm text-gray-800 mb-3 font-medium">
    Rekomendasi Mobil Populer
    </p>
    <div class="swiper">
    <div class="swiper-wrapper">
        @foreach ($popularCars as $car)
        <a
            href="{{ route('user.car.detail', $car->id) }}" 
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
        href="{{ route('user.car.detail', $car->id) }}"
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
@endsection