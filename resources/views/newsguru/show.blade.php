<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>{{ $news->title }}</title>
    <style>
        .news-container { width: 60%; margin: auto; padding-top: 20px; }
        .news-date { color: #888; font-size: 0.9em; }
        .news-title { font-size: 2em; color: #333; }
        .news-content { margin-top: 20px; line-height: 1.6; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="news-title">{{ $news->title }}</h1>
        <div class="news-date">{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y') }}</div>
        <div class="news-content">{{ $news->content }}</div>
        <a href="{{ route('newsguru.index') }}">← Kembali ke Daftar Berita</a>
    </div>
</body>
</html>
