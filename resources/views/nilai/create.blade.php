@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Tambah Data Nilai</h1>
    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') }}">
            @error('nis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @foreach(['ppkn' => 'PPKN', 'b_indo' => 'Bahasa Indonesia', 'agama' => 'Agama', 'mtk' => 'Matematika', 'ipa' => 'IPA', 'ips' => 'IPS', 'b_inggris' => 'Bahasa Inggris'] as $field => $label)
        <div class="mb-3">
            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
            <input type="number" class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" name="{{ $field }}" value="{{ old($field) }}">
            @error($field)
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
