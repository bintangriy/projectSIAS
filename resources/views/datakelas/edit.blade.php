@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Edit Data Kelas</h1>
    <form action="{{ route('datakelas.update', $datakelas->id_kelas) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_kelas">ID Kelas</label>
            <input type="text" name="id_kelas" id="id_kelas" class="form-control" value="{{ old('id_kelas', $datakelas->id_kelas) }}" readonly>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old('kelas', $datakelas->kelas) }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
