<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Car Rental</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/image/favicon.png" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
  </head>

  <body class="bg-white text-black font-sans">
    
    {{-- HEADER --}}
    @include('partials-mobile.header')

    {{-- CONTENT --}}
    @yield('content')
   
    <!-- Footer Info -->
    @if (!Route::is('user.profil') && !Route::is('car.category'))
        @include('partials-mobile.footer')
    @endif

    <!-- Bottom Navigation -->
    @include('partials-mobile.navbar')
    
    <!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('mobile/assets/js/script.js') }}"></script>
  </body>
</html>
