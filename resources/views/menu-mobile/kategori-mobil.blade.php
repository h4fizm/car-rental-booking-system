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
    <div class="px-4 mt-4 relative">
        <span class="absolute inset-y-0 left-8 flex items-center pointer-events-none">
            <i class="fas fa-search text-gray-400 text-sm"></i>
        </span>
        <input
            id="searchInput"
            type="text"
            name="search"
            placeholder="Cari berdasarkan nama atau tipe mobil..."
            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-black"
        />
    </div>

    <!-- Filter Category: Dropdown Harga -->
    <div class="px-4 mt-4">
        <label for="sortSelect" class="text-sm font-medium text-gray-700 block mb-3">
            Urutkan berdasarkan
        </label>
        <select
            id="sortSelect"
            name="sortHarga"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-black"
        >
            <option value="termurah">Harga Terendah ke Tertinggi</option>
            <option value="termahal">Harga Tertinggi ke Terendah</option>
        </select>
    </div>

    <!-- Daftar Mobil -->
    <div id="carList" class="p-4 space-y-5 mb-5">
        @forelse ($cars as $car)
            <div class="car-item"
                 data-name="{{ strtolower($car->name) }}"
                 data-price="{{ $car->price }}">
                <a href="{{ route('user.car.detail', $car->id) }}" class="block">
                    <div class="flex bg-gray-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                        <img src="{{ asset('storage/' . $car->photo) }}" class="w-32 h-24 object-cover"
                             alt="{{ $car->name }}" />
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
            </div>
        @empty
            <p class="text-center text-sm text-gray-500">Belum ada mobil tersedia untuk kategori ini.</p>
        @endforelse
    </div>

    <!-- Message when no cars match -->
    <p id="noCarsMessage" class="hidden text-center text-sm text-gray-500 px-4">
        Tidak ada mobil yang cocok dengan pencarian atau filter saat ini.
    </p>

    <!-- Script Filter & Sort -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const sortSelect = document.getElementById('sortSelect');
            const carList = document.getElementById('carList');
            const carItems = Array.from(document.querySelectorAll('.car-item'));
            const noCarsMessage = document.getElementById('noCarsMessage');

            function updateList() {
                const searchTerm = searchInput.value.toLowerCase();

                let filtered = carItems.filter(item => {
                    const name = item.getAttribute('data-name');
                    return name.includes(searchTerm);
                });

                // Sort
                const sortValue = sortSelect.value;
                filtered.sort((a, b) => {
                    const priceA = parseInt(a.getAttribute('data-price'));
                    const priceB = parseInt(b.getAttribute('data-price'));
                    return sortValue === 'termahal' ? priceB - priceA : priceA - priceB;
                });

                // Update DOM
                carList.innerHTML = '';
                if (filtered.length === 0) {
                    noCarsMessage.classList.remove('hidden');
                } else {
                    noCarsMessage.classList.add('hidden');
                    filtered.forEach(item => carList.appendChild(item));
                }
            }

            searchInput.addEventListener('input', updateList);
            sortSelect.addEventListener('change', updateList);

            // Show all cars by default
            updateList();
        });
    </script>
@endsection
