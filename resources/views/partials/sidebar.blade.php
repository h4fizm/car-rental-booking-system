<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                
                <div class="sb-sidenav-menu-heading">Menu Utama</div>
                @php
                    $dashboardRoute = '';

                    if (auth()->user()->hasRole('admin')) {
                        $dashboardRoute = '/admin/dashboard';
                    } elseif (auth()->user()->hasRole('operator')) {
                        $dashboardRoute = '/operator/dashboard';
                    } elseif (auth()->user()->hasRole('user')) {
                        $dashboardRoute = '/dashboard';
                    }
                @endphp

                <a class="nav-link" href="{{ url($dashboardRoute) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                
                <div class="sb-sidenav-menu-heading">Informasi</div>
                <!-- Daftar Mobil Rental -->
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                    Daftar Mobil Rental
                </a>
                <!-- Daftar Pesanan User -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePesanan" aria-expanded="false" aria-controls="collapsePesanan">
                    <div class="sb-nav-link-icon"><i class="fas fa-receipt"></i></div>
                    Daftar Pesanan User
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePesanan" aria-labelledby="headingPesanan" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Status Diterima</a>
                        <a class="nav-link" href="">Status Pending</a>
                        <a class="nav-link" href="">Status Cancel</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Pengaturan</div>
                {{-- Manajemen User --}}
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Manajemen User
                </a>
                <!-- Profil -->
                <a class="nav-link" href="{{ route('profile.edit') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    @if(auth()->user()->hasRole('admin'))
                        Profil Admin
                    @elseif(auth()->user()->hasRole('user'))
                        Profil User
                    @elseif(auth()->user()->hasRole('operator'))
                        Profil Operator
                    @endif
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>