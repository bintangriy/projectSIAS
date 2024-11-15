<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with('siswa')->get();
        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $siswas = Datasiswa::all(); // Ambil data siswa untuk pilihan
        return view('nilai.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'mata_pelajaran' => 'required|string',
            'nilai' => 'required|numeric|between:0,100',
        ]);

        Nilai::create($request->all());
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan!');
    }
}
