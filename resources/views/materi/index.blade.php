@extends('layouts.siswamain')
@section('content')
<br>
<div class="container">
    <h2>Daftar Materi Pembelajaran</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materis as $materi)
                <tr>
                    <td>{{ $materi->judul }}</td>
                    <td>{{ $materi->deskripsi }}</td>
                    <td>
                        <a href="{{ route('materi.download', $materi->id) }}" class="btn btn-sm btn-success">Download</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
