@extends('layouts.main')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Data Mata Pelajaran</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mata Pelajaran</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('mapel.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            <i class="fas fa-table me-1"></i>
            Tabel
        </div>
        <div class="card-body">
            <table id="datatablesSimple" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Mapel</th>
                        <th>Pengajar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $m)
                    <tr>
                        <td>{{ $m->id_mapel }}</td>
                        <td>{{ $m->nama_mapel }}</td>
                        <td>{{ $m->guru->nama ?? 'Tidak Ditemukan' }}</td>
                        <td>
                            <a href="{{ route('mapel.edit', $m->id_mapel) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('mapel.destroy', $m->id_mapel) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
