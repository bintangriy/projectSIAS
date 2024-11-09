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
                    @foreach($absensiGuru as $absensi)
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

@endsection