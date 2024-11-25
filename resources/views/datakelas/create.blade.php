@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Tambah Data Kelas</h1>
    <form action="{{ route('datakelas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_kelas">id_kelas</label>
            <input type="text" name="id_kelas" id="id_kelas" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
