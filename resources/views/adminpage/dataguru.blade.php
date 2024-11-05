@extends('layouts.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Guru</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="{{ route('dataguru.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                                <i class="fas fa-table me-1"></i>
                                Tabel
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple", border="1">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Pendidikan</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Pendidikan</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($dataguru as $j)
                                        <tr>
                                            <td>{{ $j->nip }}</td>
                                            <td>{{ $j->nama }}</td>
                                            <td>{{ $j->pendidikan }}</td>
                                            <td>{{ $j->jabatan }}</td>
                                            <td>
                                                <a href="{{ route('dataguru.edit', $j->nip) }}" class="btn btn-sm btn-warning">edit</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$j->nip}}">
                                                    hapus
                                                </button>
                                                <div class="modal fade" id="exampleModal{{$j->nip}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                          Apakah anda yakin akan menghapus data {{$j->nama}}
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  
                                                          <form action="{{ route('dataguru.destroy', $j->nip) }}" method="POST" style="display:inline;">
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
