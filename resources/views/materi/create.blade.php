@extends('layouts.gurumain')
@section('content')
<br>
<div class="container">
    <h2>Upload Materi Pembelajaran</h2>
    <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul Materi</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="nip">Guru</label>
            <select name="nip" id="nip" class="form-control">
                @foreach($gurus as $guru)
                    <option value="{{ $guru->nip }}">{{ $guru->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Upload File</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>

@endsection
