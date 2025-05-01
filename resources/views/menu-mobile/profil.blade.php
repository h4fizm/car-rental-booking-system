@extends('main-mobile')
@section('title', 'Laman Profil User')
@section('content')

<!-- Profil Card -->
<section class="px-4 py-6">
    <div class="bg-gray-100 rounded-2xl p-4 flex items-center gap-4 shadow-md">
        <!-- Foto Profil -->
        <div class="flex flex-col items-center">
            <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-black">
                <img
                    src="{{ $user->profile_photo_url ?? 'https://i.pravatar.cc/100' }}"
                    alt="Avatar"
                    class="w-full h-full object-cover"
                    id="profilePreview"
                />
            </div>

            <label
                for="uploadPhoto"
                class="mt-2 text-sm text-blue-600 font-medium cursor-pointer hover:underline"
            >
                Edit Foto
            </label>
            <input
                type="file"
                id="uploadPhoto"
                accept="image/*"
                class="hidden"
                onchange="previewPhoto(event)"
            />
        </div>

        <!-- Nama dan Role -->
        <div>
            <h2 class="text-xl font-bold text-black">{{ $user->name }}</h2>
            <span class="inline-block mt-1 bg-black text-white text-xs font-semibold px-3 py-1 rounded-full">
                {{ ucfirst($user->getRoleNames()->first()) }}
            </span>
        </div>
    </div>
</section>

<!-- Info Section: Form Profil -->
<section class="px-4 mt-6">
    <form class="space-y-4" method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <!-- Username -->
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input
                type="text"
                id="username"
                name="name"
                value="{{ old('name', $user->name) }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
            />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
            />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="relative">
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
                />
                <button
                    type="button"
                    id="togglePassword"
                    class="absolute inset-y-0 right-3 flex items-center text-sm text-gray-500"
                    onclick="togglePasswordVisibility()"
                >
                    Tampilkan
                </button>
            </div>
        </div>

        <!-- Save Button -->
        <button
            type="submit"
            class="w-full bg-black text-white py-3 rounded-xl font-medium hover:bg-gray-800 transition mt-10"
        >
            Simpan Perubahan
        </button>
    </form>
</section>

@endsection
