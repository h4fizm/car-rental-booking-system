@extends('main')

@section('title', 'Laman Dashboard')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laman Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Total User</li>
        </ol>

        <div class="row">
            <!-- Card Total User -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <h5>Total Users</h5>
                        <p>{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Total Admin -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h5>Total Admin</h5>
                        <p>{{ $totalAdmins }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Total User Role -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h5>Total Users Role</h5>
                        <p>{{ $totalUsersRole }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Total Operator -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5>Total Operators</h5>
                        <p>{{ $totalOperators }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
