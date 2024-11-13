@extends('layouts.main')
@section('content')
    

    <style>
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="date"], textarea { width: 100%; padding: 8px; }
        button { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>

    <div class="container">
        <h1>Tambah Berita</h1>
        
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('news.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Judul Berita:</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="content">Isi Berita:</label>
                <textarea name="content" id="content" rows="5" required></textarea>
            </div>

            <button type="submit">Simpan</button>
        </form>
    </div>
@endsection
