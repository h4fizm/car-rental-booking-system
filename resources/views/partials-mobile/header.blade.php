<!-- Header -->
<div class="bg-white text-black p-4">
    <div class="flex justify-between items-center">
    <!-- Logo -->
    <a
        href="{{ route('user.dashboard') }}"
        class="font-extrabold text-2xl tracking-wide hover:opacity-80 transition"
    >
        Rental Car
    </a>

    <div class="flex items-center gap-3 relative">
        <!-- Pesan Button -->
        <a
        href="{{ route('user.cars.list') }}"
        class="flex items-center gap-2 bg-black text-white px-4 py-2 rounded-full text-sm shadow-md"
        >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-5 h-5"
        >
            <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M8.25 18.75a1.5 1.5 0 01-3 0m0 0a1.5 1.5 0 013 0m0 0h7.5m0 0a1.5 1.5 0 003 0m-3 0a1.5 1.5 0 013 0M4.5 18.75H3.375a.375.375 0 01-.375-.375V12.75a.75.75 0 01.75-.75h1.125m15 6.75h1.125a.375.375 0 00.375-.375V14.25a.75.75 0 00-.75-.75h-1.125M4.5 18.75v-9.75a.75.75 0 01.75-.75h13.5a.75.75 0 01.75.75v9.75"
            />
        </svg>
        Pesan
        </a>

        <!-- Dropdown -->
        <div class="relative">
        <button
            id="dropdownButton"
            class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center"
        >
            <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 12h14M5 6h14M5 18h14"
            />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div
            id="dropdownMenu"
            class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg hidden z-50"
        >
            <a
            href="{{ route('user.dashboard') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
            >Beranda</a
            >
            <a
            href="{{ route('user.cars.list') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
            >Daftar Mobil</a
            >
            <a
            href="{{ route('user.history') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
            >Riwayat</a
            >
            <a
            href="{{ route('user.profil') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
            >Profile</a
            >
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <a href="#" 
                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>