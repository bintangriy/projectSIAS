@extends('layouts.main')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4"></h1>
    <div class="card mb-4">
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Absensi
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <a href="{{ route('adminpage.registeruser') }}" class="btn btn-primary mb-3"> Tambah User </a>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection