@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Jumlah Siswa</div>
                <div class="card-body">
                    <h1><i class="fa-solid fa-users"></i>   {{ $data['siswa_count'] }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header"> Jumlah Guru</div>
                <div class="card-body">
                    <h1><i class="fa-solid fa-user"></i>    {{ $data['guru_count'] }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header"> Jumlah Admin</div>
                <div class="card-body">
                    <h1><i class="fa-solid fa-user-tie"></i>    {{ $data['admin_count'] }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header"> Jumlah Mapel</div>
                <div class="card-body">
                    <h1><i class="fa-solid fa-book"></i>    {{ $data['mapel_count'] }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Absensi
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-bordered">
                            <!--<a href="{{ route('absensi.create') }}" class="btn btn-primary">Tambah Absensi</a> -->
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tanggal Absensi</th>
                                    <th>Jam Absensi</th>
                                    <th>Lokasi</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($absensis as $absensi)
                                    <tr>
                                        <td>{{ $absensi->id }}</td>
                                        <td>{{ optional($absensi->user)->name ?? 'Tidak ada user' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($absensi->tanggal_absensi)->translatedFormat('d F Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($absensi->jam_absensi)->format('H:i') }}</td>
                                        <td>
                                            <a href="https://www.google.com/maps?q={{ $absensi->latitude }},{{ $absensi->longitude }}" 
                                               target="_blank" class="btn btn-primary btn-sm">
                                               Lihat Lokasi
                                            </a>
                                        </td>
                                        <td><img src="{{ asset('storage/'.$absensi->foto) }}" width="100"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
