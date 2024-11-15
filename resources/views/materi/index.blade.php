@extends('layouts.siswamain')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Materi Pembelajaran</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Materi Pembelajaran</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('datasiswa.create') }}" class="btn btn-sm btn-primary">Tambah File</a>
            <i class="fas fa-table me-1"></i>
            Tabel
        </div>
        <div class="card-body">
            <table id="datatablesSimple", border="1">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Guru</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Guru</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($materis as $materi)
                    <tr>
                        <td>{{ $materi->judul }}</td>
                        <td>{{ $materi->deskripsi }}</td>
                        <td>{{ $materi->nama}}</td>
                        <td>
                            <a href="{{ route('materi.download', $materi->id) }}" class="btn btn-sm btn-success">Download</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

