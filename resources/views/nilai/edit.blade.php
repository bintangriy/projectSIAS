@extends('layouts.main')
@section('content')
    
<div class="container">
    <h1>Edit Nilai Siswa</h1>    
        
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <label for="nis">NIS:</label>
            @foreach ($datasiswa as $k)
                            <option value="{{ $k->nis }}">{{ $k->nama }}</option>
                        @endforeach
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>
            
            <!-- Tambahkan field nilai -->
            <button type="submit">Simpan</button>
        </form>
</div>
    
@endsection
