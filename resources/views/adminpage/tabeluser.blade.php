@extends('layouts.main')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4"></h1>
    <div class="card mb-4">
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Absensi
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <a href="{{ route('adduser.create') }}" class="btn btn-primary mb-3"> Tambah User </a>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('adduser.edit', $user->id) }}" class="btn btn-sm btn-warning">edit</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                                                    hapus
                                                </button>
                                                <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                          Apakah anda yakin akan menghapus data {{$user->name}}
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  
                                                          <form action="{{ route('adduser.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                          </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection