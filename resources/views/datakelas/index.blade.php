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
                <a href="{{ route('datakelas.create') }}" class="btn btn-primary">Tambah Kelas</a>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datakelas as $kelas)
                                <tr>
                                    <td>{{ $kelas->id_kelas }}</td>
                                    <td>{{ $kelas->kelas }}</td>
                                    <td> <a href="{{ route('datakelas.edit', $kelas->id_kelas) }}"class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('datakelas.destroy', $kelas->id_kelas) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form></td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
@endsection
