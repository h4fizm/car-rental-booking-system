@extends('main-mobile')

@section('title', $car->name)

@section('content')
<div class="w-full max-w-sm mx-auto mt-6 px-4 sm:px-6 lg:px-8">
  <div class="bg-white rounded-xl shadow-md p-4 min-h-[400px]">

    {{-- Gambar Mobil dengan tombol back di dalamnya --}}
    <div class="relative mb-4">
      <img src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->name }}"
        class="w-full h-52 object-cover rounded-xl shadow-lg" />
      
      {{-- Tombol kembali di pojok kiri atas gambar --}}
      <a href="{{ url()->previous() }}"
        class="absolute top-2 left-2 bg-white p-2 rounded-full shadow hover:bg-gray-100 transition">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="w-5 h-5 text-black">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
      </a>
    </div>

    {{-- Detail Mobil --}}
    <div class="space-y-4">
      <div>
        <p class="text-xs text-gray-500 uppercase tracking-wide">{{ $car->type->name ?? '-' }}</p>
        <h1 class="text-xl font-bold text-black">{{ $car->name }}</h1>
      </div>

      <div>
        <h2 class="text-sm font-semibold text-gray-700">Deskripsi</h2>
        <p class="text-sm text-gray-600 leading-relaxed">{{ $car->description }}</p>
      </div>

      <div class="flex items-center justify-between">
        <span class="text-base font-semibold text-black">Harga Sewa</span>
        <span class="text-lg font-bold text-green-600">Rp {{ number_format($car->price, 0, ',', '.') }} / hari</span>
      </div>
    </div>

    {{-- Tombol Sewa --}}
    <div class="mt-6">
      <form action="{{ route('user.checkout', ['car' => $car->id]) }}" method="GET">
        <input type="hidden" name="name" value="{{ $car->name }}">
        <input type="hidden" name="category" value="{{ $car->type->name ?? '-' }}">
        <button type="submit"
          class="w-full text-center py-3 rounded-xl bg-green-500 hover:bg-green-600 text-white font-semibold transition">
          Sewa Sekarang
        </button>
      </form>
    </div>

  </div>
</div>
@endsection
