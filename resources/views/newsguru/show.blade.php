@extends('layouts.gurumain')
@section('content')
    <div class="container">
        <h1 class="news-title">{{ $news->title }}</h1>
        <div class="news-date">{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y') }}</div>
        <div class="news-content">{{ $news->content }}</div>
        <br>
        <a href="{{ route('newsguru.index') }}" class="btn btn-primary">Kembali ke Daftar Berita</a>
    </div>

@endsection
