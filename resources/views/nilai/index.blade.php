@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Nilai Siswa</h1>
    <a href="{{ route('nilai.create') }}" class="btn btn-primary">Tambah Nilai</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilais as $nilai)
                <tr>
                    <td>{{ $nilai->siswa->nama }}</td>
                    <td>{{ $nilai->mata_pelajaran }}</td>
                    <td>{{ $nilai->nilai }}</td>
                    <td>
                        <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
