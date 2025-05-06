@extends('main-mobile')
@section('title', 'Riwayat Booking')
@section('content')
@php
    \Carbon\Carbon::setLocale('id'); // Set locale ke Indonesia
@endphp
<!-- Riwayat Rental Section -->
<div class="p-4 space-y-4 mb-16">
    <h2 class="text-md font-semibold mb-2">Riwayat Pemesanan</h2>

    <!-- Search Bar with Icon -->
    <div class="mb-4 relative">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
            </svg>
        </span>
        <input type="text" name="search" placeholder="Cari berdasarkan nama, status, atau tipe mobil..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-black" />
    </div>

    <!-- Loop melalui semua order -->
    @forelse($orders as $order)
    <div class="bg-white rounded-2xl shadow p-4 flex items-start gap-4 border border-gray-200">
        <!-- Avatar Mobil -->
        <div class="w-12 h-12 rounded-full overflow-hidden border border-gray-300">
            @if($order->car && $order->car->type)
                @php
                    $typeLower = strtolower($order->car->type->name);
                    $iconFile = $carIcons[$typeLower] ?? 'default-car.png';
                @endphp
                
                <img src="{{ asset('mobile/assets/image/' . $iconFile) }}" 
                    alt="{{ $order->car->type->name }}" 
                    class="object-cover w-full h-full" />
            @else
                <img src="{{ asset('mobile/assets/image/default-car.png') }}" 
                    alt="Default Car" 
                    class="object-cover w-full h-full" />
            @endif
        </div>

        <!-- Info Pemesanan -->
        <div class="flex-1">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-semibold text-md">{{ $order->car->name ?? 'N/A' }}</h3>
                    <p class="text-xs text-gray-500">Kategori : {{ $order->car->type->name ?? 'N/A' }}</p>
                </div>
                <!-- Status sederhana tanpa styling -->
                <span class="text-xs text-yellow-500">Pending</span>
                {{-- <span class="text-xs text-red-500">Reject</span>
                <span class="text-xs text-green-500">Accept</span>
                <span class="text-xs text-blue-500">Finish</span> --}}
            </div>

            <div class="mt-2 space-y-1 text-sm text-gray-700">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                    <p>Diajukan : {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('l, d M Y - H:i') }} WIB</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                    <p>Periode Sewa : 
                        {{ \Carbon\Carbon::parse($order->start_date)->timezone('Asia/Jakarta')->isoFormat('D MMM') }} – 
                        {{ \Carbon\Carbon::parse($order->end_date)->timezone('Asia/Jakarta')->isoFormat('D MMM YYYY') }}, 
                        pukul {{ \Carbon\Carbon::parse($order->start_time)->timezone('Asia/Jakarta')->format('H:i') }} - 
                        {{ \Carbon\Carbon::parse($order->end_time)->timezone('Asia/Jakarta')->format('H:i') }} WIB
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                    <p>Atas nama : {{ $order->user->name }}</p>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-2xl shadow p-4 text-center">
        <p class="text-gray-500">Anda belum memiliki riwayat pemesanan.</p>
    </div>
    @endforelse
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input[name="search"]');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const cards = document.querySelectorAll('.bg-white.rounded-2xl');
        
        cards.forEach(card => {
            const text = card.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>
@endsection