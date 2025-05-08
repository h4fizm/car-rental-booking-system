@extends('main-mobile')

@section('title', 'Laman Checkout Pemesanan')

@section('content')

<!-- Checkout Section -->
<div class="w-full max-w-sm mx-auto mt-6 px-4 sm:px-6 lg:px-8">
  <div class="bg-gray-100 rounded-xl shadow-md p-4 relative">

    <!-- Tombol Kembali (Icon X) -->
    <a href="{{ route('user.car.detail', $car->id) }}"
    class="absolute top-3 right-3 text-gray-500 hover:text-black transition"
    title="Kembali">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
        </svg>
    </a>

    <h2 class="text-xl font-bold mb-4 text-center">Checkout Pemesanan</h2>

    <form action="{{ route('user.checkout.store', $car->id) }}" method="POST" class="space-y-4 pb-16">
      @csrf
      <!-- Nama Mobil -->
      <div>
        <label class="block text-sm font-medium mb-1">Nama Mobil</label>
        <input type="text" value="{{ $name }}" 
          class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white" readonly />
      </div>

      <!-- Jenis Mobil -->
      <div>
        <label class="block text-sm font-medium mb-1">Jenis Mobil</label>
        <div class="flex items-center gap-2 border border-gray-300 rounded-lg px-3 py-2 bg-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 13l2-5h14l2 5M5 13v5m14-5v5M7.5 18.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM16.5 18.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
          </svg>
          <span class="text-sm">{{ $category }}</span>
        </div>
      </div>

    <!-- Tanggal & Jam Peminjaman -->
    <div>
    <label class="block text-sm font-medium mb-1">Tanggal & Jam Peminjaman</label>
    <div class="grid grid-cols-2 gap-2">
        <input type="date" name="start_date" required
        class="px-3 py-2 border border-gray-300 rounded-lg bg-white" />
        <input type="time" name="start_time" required
        class="px-3 py-2 border border-gray-300 rounded-lg bg-white" />
        <input type="date" name="end_date" required
        class="px-3 py-2 border border-gray-300 rounded-lg bg-white" />
        <input type="time" name="end_time" required
        class="px-3 py-2 border border-gray-300 rounded-lg bg-white" />
    </div>
    </div>

      <!-- Deskripsi -->
      <div>
        <label class="block text-sm font-medium mb-1">Deskripsi</label>
        <input type="text" name="description" placeholder="Tulis Deskripsi"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white" />
      </div>

      <!-- Hidden input untuk harga per hari -->
      <input type="hidden" id="price_per_day" value="{{ $pricePerDay }}">

      <!-- Total Harga -->
      <div class="mt-4 bg-white px-4 py-3 rounded-lg border border-gray-300">
        <div class="flex justify-between items-center text-sm">
            <span>Total Harga:</span>
            <span class="font-bold text-green-600" id="total_price">Rp 0</span>
        </div>
      </div>

      <!-- Tombol Submit -->
      <button type="submit"
        class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg hover:bg-green-700 transition">
        Konfirmasi Pemesanan
      </button>
    </form>
  </div>
</div>

<script>
    const startDateInput = document.querySelector('input[name="start_date"]');
    const endDateInput = document.querySelector('input[name="end_date"]');
    const totalPriceEl = document.getElementById('total_price');
    const pricePerDay = parseInt(document.getElementById('price_per_day').value);

    function updateTotalPrice() {
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);
    
    // Validasi: Pastikan tanggal mulai tidak lebih besar dari tanggal akhir
    if (startDate > endDate) {
        alert("Pemilihan Tanggal Kurang Tepat.");
        totalPriceEl.textContent = "Rp 0"; // Reset harga total
        return;
    }
    
    // Validasi: Pastikan tanggal mulai tidak lebih kecil dari hari ini
    const today = new Date();
    if (startDate < today) {
        alert("Tanggal mulai tidak bisa sebelum hari ini.");
        totalPriceEl.textContent = "Rp 0"; // Reset harga total
        return;
    }

    if (!isNaN(startDate) && !isNaN(endDate) && endDate >= startDate) {
        const timeDiff = endDate.getTime() - startDate.getTime();
        const days = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1; // +1 untuk hari pertama
        const totalPrice = days * pricePerDay;
        totalPriceEl.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
    } else {
        totalPriceEl.textContent = "Rp 0";
    }
    }

    startDateInput.addEventListener('change', updateTotalPrice);
    endDateInput.addEventListener('change', updateTotalPrice);

</script>

@endsection
