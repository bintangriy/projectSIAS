@extends('layouts.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Siswa</h1>
    <ol class="breadcrumb mb-4">
        <a href="{{ route('datasiswa.create') }}" class="btn btn-primary mb-3"> Tambah Siswa </a>
    </ol>
    
    @foreach ($datasiswa as $kelas_id => $siswa)
        <div class="card mb-4">
            <div class="card-header">
                <h3>Kelas: {{ $siswa->first()->datakelas->kelas }}</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $k)
                            <tr>
                                <td>{{ $k->nis }}</td>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->alamat }}</td>
                                <td>{{ $k->jenis_kelamin }}</td>
                                <td>
                                    <a href="{{ route('datasiswa.edit', $k->nis) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $k->nis }}">
                                        Hapus
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $k->nis }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data {{ $k->nama }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <form action="{{ route('datasiswa.destroy', $k->nis) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>
@endsection
