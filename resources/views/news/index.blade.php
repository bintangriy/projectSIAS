@extends('layouts.main')
@section('content')

    <style>
        .news-container { width: 100%; margin: auto; }
        .news-item { border-bottom: 1px solid #ddd; padding: 10px 0; }
        .news-date { color: #888; font-size: 0.9em; }
        .news-title { font-size: 1.2em; color: #333; text-decoration: none; }
    </style>

    

    <div class="container">
        <h1>News</h1>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary">Tambah Pengumuman</a>
            </div>
        </div>

        @foreach($news as $item)
            <div class="news-item">
                <div class="news-date">{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
                <a href="{{ route('news.show', $item->id) }}" class="news-title">{{ $item->title }}</a>
            </div>
        @endforeach
    </div>

   
    
    @endsection