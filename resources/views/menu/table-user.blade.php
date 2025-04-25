@extends('main')
@section('title', 'Laman Profil')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manajamen User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Pengguna User</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Pengguna
            </div>
            <div class="card-body">
                <table id="userTable" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 5%; text-align: center;">No</th> <!-- Kolom No diperkecil -->
                            <th>Nama User</th>
                            <th style="width: 15%; text-align: center;">Role User</th> <!-- Kolom Role dipusatkan -->
                            <th style="width: 20%; text-align: center;">Aksi</th> <!-- Kolom Aksi diperkecil dan dipusatkan -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style='text-align: center';>1</td>
                            <td>John Doe</td>
                            <td class="text-center"><span class="badge bg-danger">Admin</span></td> <!-- Badge Admin -->
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align: center';>2</td>
                            <td>Jane Smith</td>
                            <td class="text-center"><span class="badge bg-primary">User</span></td> <!-- Badge User -->
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align: center';>3</td>
                            <td>Robert Johnson</td>
                            <td class="text-center"><span class="badge bg-success">Operator</span></td> <!-- Badge Operator -->
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align: center';>4</td>
                            <td>Sarah Williams</td>
                            <td class="text-center"><span class="badge bg-primary">User</span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align: center';>5</td>
                            <td>Michael Brown</td>
                            <td class="text-center"><span class="badge bg-success">Operator</span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
