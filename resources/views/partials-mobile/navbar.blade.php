<nav
    class="fixed bottom-0 left-0 right-0 bg-white bg-opacity-90 backdrop-blur text-black border-t border-gray-200 shadow-md flex justify-around py-1.5 z-50"
>
    <!-- Beranda -->
    <a
        href="{{ route('user.dashboard') }}"
        class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] px-2 py-1 transition rounded-md {{ request()->routeIs('user.dashboard') ? 'bg-gray-300 shadow text-black' : 'hover:bg-gray-300 hover:text-black text-black' }}"
    >
        <!-- SVG ICON -->
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75M4.5 10.5V20.25h15V10.5" />
        </svg>
        Beranda
    </a>

    <!-- Daftar Mobil -->
    <a
        href="{{ route('user.cars.list') }}"
        class="flex flex-col items-center justify-center w-16 gap-0.5 text-[8px] px-2 py-1 transition rounded-md {{ request()->routeIs('user.cars.list') ? 'bg-gray-300 shadow text-black' : 'hover:bg-gray-300 hover:text-black text-black' }}"
    >
        <!-- SVG ICON -->
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13l2-5h14l2 5M5 13v5m14-5v5M7.5 18.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM16.5 18.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
        </svg>
        Daftar Mobil
    </a>

    <!-- Riwayat -->
    <a
        href="{{ route('user.history') }}"
        class="flex flex-col items-center justify-center w-16 gap-0.5 text-[10px] px-2 py-1 transition rounded-md {{ request()->routeIs('user.history') ? 'bg-gray-300 shadow text-black' : 'hover:bg-gray-300 hover:text-black text-black' }}"
    >
        <!-- SVG ICON -->
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 3h6a2 2 0 012 2v2H7V5a2 2 0 012-2zM5 9h14M5 13h14M5 17h14" />
        </svg>
        Riwayat
    </a>

    <!-- Profil -->
    <a
        href="{{ route('user.profil') }}"
        class="flex flex-col items-center justify-center w-16 gap-0.5 text-[10px] px-2 py-1 transition rounded-md {{ request()->routeIs('user.profil') ? 'bg-gray-300 shadow text-black' : 'hover:bg-gray-300 hover:text-black text-black' }}"
    >
        <!-- SVG ICON -->
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 14a4 4 0 01-8 0m8 0a4 4 0 00-8 0m8 0v2a4 4 0 01-8 0v-2m4-6a4 4 0 100-8 4 4 0 000 8z" />
        </svg>
        Profil
    </a>

</nav>
