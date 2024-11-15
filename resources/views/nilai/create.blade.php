@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Tambah Nilai Siswa</h1>
    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="siswa_id">Nama Siswa</label>
            <select name="siswa_id" id="siswa_id" class="form-control">
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="mata_pelajaran">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" name="nilai" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
