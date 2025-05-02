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

  <!-- Search Bar -->
  <div class="mt-4 relative">
    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
      <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
      </svg>
    </span>
    <input type="text" name="search" id="searchBar"
      placeholder="Cari berdasarkan nama, jenis kendaraan, atau tipe mobil..."
      class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-black" />
  </div>
</div>

<!-- Filter Section -->
<div class="p-4 space-y-4">
  <div>
    <label class="block mb-3 font-medium text-sm">Jenis Mobil</label>
    <div class="grid grid-cols-4 gap-2 text-center text-xs">
      @foreach ($types as $type)
        @php
          $shortName = match(strtolower($type->name)) {
            'mobil listrik' => 'E-Car',
            'mobil pickup' => 'Pickup',
            'mobil sport' => 'Sport',
            'mobil minivan' => 'Minivan',
            'mobil mewah' => 'Luxury',
            'mobil suv' => 'SUV',
            'mobil sedan' => 'Sedan',
            'mobil truk box' => 'Truckbox',
            default => Str::limit($type->name, 8),
          };
        @endphp

        <button class="bg-gray-100 rounded-full px-3 py-2 w-full text-ellipsis overflow-hidden whitespace-nowrap hover:bg-black hover:text-white filter-btn text-xs font-medium"
          data-type="{{ $type->id }}">
          {{ $shortName }}
        </button>
      @endforeach
    </div>
  </div>
</div>

<!-- List Mobil -->
<div class="px-4 py-2 pb-8">
  <p class="text-sm text-gray-800 mb-5 font-medium">
    List Mobil Berdasarkan Category
  </p>
  <div class="grid grid-cols-1 gap-5" id="carList">
    <p id="noCarsMessage" class="hidden text-center text-gray-500">
      Tidak Ada Mobil yang Terdaftar di kategori ini
    </p>

    @foreach ($allCars as $mobil)
      <a href="{{ url('/mobil/' . $mobil->id) }}"
        class="car-item block bg-gray-100 rounded-xl shadow overflow-hidden hover:shadow-md transition"
        data-type="{{ $mobil->type->id }}"
        data-name="{{ strtolower($mobil->name . ' ' . $mobil->type->name) }}">
        <img src="{{ asset('storage/' . $mobil->photo) }}" alt="{{ $mobil->name }}"
          class="w-full h-40 object-cover" />
        <div class="p-4">
          <p class="text-sm font-semibold">{{ $mobil->name }}</p>
          <p class="text-xs text-gray-500">{{ $mobil->type->name ?? 'Tipe tidak tersedia' }}</p>
          <p class="text-xs text-black mt-1 font-medium">Rp {{ number_format($mobil->price, 0, ',', '.') }}/hari</p>
        </div>
      </a>
    @endforeach
  </div>
</div>

<!-- Carousel Section -->
<div class="px-4 py-2">
  <p class="text-sm text-gray-800 mb-1 font-medium">
    Rekomendasi Mobil Populer
  </p>
  <div class="swiper">
    <div class="swiper-wrapper">
      @foreach ($mobilPopuler as $mobil)
        <a href="{{ url('/mobil/' . $mobil->id) }}"
          class="swiper-slide w-64 rounded-2xl overflow-hidden shadow-md bg-white mb-4 block">
          <img src="{{ asset('storage/' . $mobil->photo) }}" alt="{{ $mobil->name }}"
            class="w-full h-36 object-cover" />
          <div class="p-3">
            <p class="text-sm font-semibold">{{ $mobil->name }}</p>
            <p class="text-xs text-gray-500">{{ $mobil->type->name ?? 'Tipe tidak tersedia' }}</p>
            <p class="text-xs text-black mt-1 font-medium">Rp {{ number_format($mobil->price, 0, ',', '.') }}/hari</p>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</div>

<!-- Script -->
<script>
  const searchBar = document.getElementById('searchBar');
  const filterButtons = document.querySelectorAll('.filter-btn');
  const carItems = document.querySelectorAll('.car-item');
  const noCarsMessage = document.getElementById('noCarsMessage');
  let activeType = null;

  function updateVisibility() {
    const searchTerm = searchBar.value.toLowerCase();
    let found = false;

    carItems.forEach(item => {
      const type = item.getAttribute('data-type');
      const name = item.getAttribute('data-name');
      const matchSearch = name.includes(searchTerm);
      const matchType = !activeType || activeType === type;

      if (matchSearch && matchType) {
        item.style.display = 'block';
        found = true;
      } else {
        item.style.display = 'none';
      }
    });

    noCarsMessage.classList.toggle('hidden', found);
  }

  searchBar.addEventListener('input', updateVisibility);

  filterButtons.forEach(button => {
    button.addEventListener('click', function () {
      const selectedType = this.getAttribute('data-type');

      if (activeType === selectedType) {
        activeType = null;
        filterButtons.forEach(btn => btn.classList.remove('bg-black', 'text-white'));
        filterButtons.forEach(btn => btn.classList.add('bg-gray-100', 'text-black'));
      } else {
        activeType = selectedType;
        filterButtons.forEach(btn => {
          btn.classList.remove('bg-black', 'text-white');
          btn.classList.add('bg-gray-100', 'text-black');
        });
        this.classList.add('bg-black', 'text-white');
        this.classList.remove('bg-gray-100', 'text-black');
      }

      updateVisibility();
    });
  });

  // Initial load
  updateVisibility();
</script>
@endsection
