@extends('main-mobile')
@section('title', 'Laman Profil User')
@section('content')

<!-- Flash Message -->
@if (session('success'))
    <div class="px-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="px-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<!-- Form Profil Lengkap -->
<section class="px-4 mt-6">
    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
        @csrf

        <!-- Profil Card -->
        <div class="bg-gray-100 rounded-2xl p-4 flex items-center gap-4 shadow-md mb-6">
            <!-- Foto Profil -->
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-black">
                    <img src="{{ $user->photo ? Storage::url($user->photo) : asset('default-avatar.png') }}"
                        alt="Avatar"
                        class="w-full h-full object-cover"
                        id="profilePreview" />
                </div>
                <button type="button" onclick="document.getElementById('uploadPhoto').click()" class="text-blue-600 text-sm font-medium hover:underline mt-2">
                    Edit Foto
                </button>
                <input type="file" id="uploadPhoto" name="photo" class="hidden" accept="image/*" onchange="previewPhoto(event)">
            </div>

            <!-- Nama dan Role -->
            <div>
                <h2 class="text-xl font-bold text-black">{{ $user->name }}</h2>
                <span class="inline-block mt-1 bg-black text-white text-xs font-semibold px-3 py-1 rounded-full">
                    {{ ucfirst($user->getRoleNames()->first()) }}
                </span>
            </div>
        </div>

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
        <div class="mt-4">
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
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="relative">
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="*****"
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

<!-- Script -->
<script>
    function previewPhoto(event) {
        const input = event.target;
        const preview = document.getElementById('profilePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");
        const toggleBtn = document.getElementById("togglePassword");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleBtn.textContent = "Sembunyikan";
        } else {
            passwordInput.type = "password";
            toggleBtn.textContent = "Tampilkan";
        }
    }

    // Trigger file input
    document.querySelector('label[for="uploadPhoto"]').addEventListener('click', function () {
        document.getElementById('uploadPhoto').click();
    });
</script>

@endsection
