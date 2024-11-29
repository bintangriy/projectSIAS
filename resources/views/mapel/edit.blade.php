@extends('layouts.main')

@section('content')
<h1 class="mb-4">Edit Mata Pelajaran</h1>
<form action="{{ route('mapel.update', $mapel->id_mapel) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_mapel" class="form-label">Nama Mapel</label>
        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="{{ $mapel->nama_mapel }}" required>
    </div>
    <div class="mb-3">
        <label for="pengajar" class="form-label">Pengajar</label>
        <select class="form-select" id="pengajar" name="pengajar" required>
            @foreach ($gurus as $guru)
            <option value="{{ $guru->nip }}" {{ $guru->nip == $mapel->pengajar ? 'selected' : '' }}>
                {{ $guru->nama }}
            </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
