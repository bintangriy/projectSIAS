@extends('layouts.siswamain')
@section('content')
    
    <title>News</title>
    <style>
        .news-container { width: 60%; margin: auto; }
        .news-item { border-bottom: 1px solid #ddd; padding: 10px 0; }
        .news-date { color: #888; font-size: 0.9em; }
        .news-title { font-size: 1.2em; color: #333; text-decoration: none; }
    </style>

    <div class="container">
        <h1>News</h1>
        @foreach($news as $item)
            <div class="news-item">
                <div class="news-date">{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</div>
                <a href="{{ route('newsguru.show', $item->id) }}" class="news-title">{{ $item->title }}</a>
            </div>
        @endforeach
    </div>
@endsection
