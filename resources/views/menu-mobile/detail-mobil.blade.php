@extends('main-mobile')

@section('title', $car->name)

@section('content')
<div class="max-w-md mx-auto px-4">
  <div class="relative mb-6">
    <a href="{{ url()->previous() }}"
      class="absolute top-3 left-3 z-10 bg-white p-2 rounded-full shadow hover:bg-gray-100 transition">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="w-5 h-5 text-black">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
      </svg>
    </a>

    <img src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->name }}"
      class="w-full h-52 object-cover rounded-2xl shadow-sm" />
  </div>

  <div class="mb-4">
    <p class="text-sm text-gray-500 uppercase tracking-wide">{{ $car->type->name ?? '-' }}</p>
    <h1 class="text-2xl font-bold text-black mb-1">{{ $car->name }}</h1>
  </div>

  <div class="mb-6">
    <h2 class="text-md font-semibold mb-1">Deskripsi</h2>
    <p class="text-sm text-gray-700 leading-relaxed">{{ $car->description }}</p>
  </div>

  <div class="flex items-center justify-between mb-6">
    <p class="text-lg font-bold text-black">Rp {{ number_format($car->price, 0, ',', '.') }} / hari</p>
  </div>
</div>

<div class="fixed bottom-16 left-0 right-0 bg-white  px-4 py-3 z-50">
  <form action="{{ route('user.checkout', ['car' => $car->id]) }}" method="GET">
    <input type="hidden" name="name" value="{{ $car->name }}">
    <input type="hidden" name="category" value="{{ $car->type->name ?? '-' }}">

    <button type="submit"
      class="w-full block text-center py-2 rounded-xl bg-green-500 text-white font-semibold">
      Sewa Sekarang
    </button>
  </form>
</div>

@endsection
