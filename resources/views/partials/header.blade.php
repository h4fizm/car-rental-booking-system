<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand -->
    <a class="navbar-brand ps-3" href="index.html">Car Rental</a>

    <!-- Sidebar Toggle -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>

    <!-- Navbar -->
    <ul class="navbar-nav ms-auto me-3 me-lg-4 ms-md-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                {{-- Profil Menu --}}
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        {{ __('Profile') }}
                    </a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <!-- Logout Menu Item -->
                <li>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>