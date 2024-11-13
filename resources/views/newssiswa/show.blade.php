@extends('layouts.siswamain')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>{{ $news->title }}</title>

    <div class="container">
        <h1 class="news-title">{{ $news->title }}</h1>
        <div class="news-date">{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y') }}</div>
        <div class="news-content">{{ $news->content }}</div>
    </div>

@endsection