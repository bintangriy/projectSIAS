@extends('layouts.main')
@section('content')
    
<div class="container-fluid px-4">
    <h1 class="mt-4">Nilai Siswa</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Nilai</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('datasiswa.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            <i class="fas fa-table me-1"></i>
            Tabel
        </div>
            <div class="card-body">
                <table id="datatablesSimple", border="1">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>PPKn</th>
                            <th>B. Indo</th>
                            <th>Agama</th>
                            <th>MTK</th>
                            <th>IPA</th>
                            <th>IPS</th>
                            <th>B. Inggris</th>
                            <th>Rata-rata</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilais as $nilai)
                        <tr>
                            <td>{{ $nilai->nis }}</td>
                            <td>{{ $nilai->ppkn }}</td>
                            <td>{{ $nilai->b_indo }}</td>
                            <td>{{ $nilai->agama }}</td>
                            <td>{{ $nilai->mtk }}</td>
                            <td>{{ $nilai->ipa }}</td>
                            <td>{{ $nilai->ips }}</td>
                            <td>{{ $nilai->b_inggris }}</td>
                            <td>{{ $nilai->rata_rata }}</td>
                            <td>
                                <a href="{{ route('nilai.edit', $nilai->id) }}"class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" style="display:inline;">
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

