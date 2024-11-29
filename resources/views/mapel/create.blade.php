@extends('layouts.main')

@section('content')
<h1 class="mb-4">Tambah Mata Pelajaran</h1>
<form action="{{ route('mapel.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_mapel" class="form-label">Nama Mapel</label>
        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required>
    </div>
    <div class="mb-3">
        <label for="pengajar" class="form-label">Pengajar</label>
        <select class="form-select" id="pengajar" name="pengajar" required>
            <option value="" disabled selected>Pilih Pengajar</option>
            @foreach ($gurus as $guru)
            <option value="{{ $guru->nip }}">{{ $guru->nama }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
