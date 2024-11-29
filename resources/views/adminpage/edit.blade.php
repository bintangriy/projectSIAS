@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
 
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit data
            </div>
            <div class="card-body">
                <form action="{{ route('datasiswa.update', $datasiswa->nis) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" name="nis" id="nis" class="form-control" value="{{ $datasiswa->nis }}" readonly>
                    </div>
                
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $datasiswa->nama }}">
                    </div>
                
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            @foreach($datakelas as $kelas)
                                <option value="{{ $kelas->id_kelas }}" {{ $kelas->id_kelas == $datasiswa->id_kelas ? 'selected' : '' }}>
                                    {{ $kelas->kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $datasiswa->alamat }}">
                    </div>
                
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="Laki-laki" {{ $datasiswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $datasiswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>                
            </div>
        </div>
    </div>
@endsection