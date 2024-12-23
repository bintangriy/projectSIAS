<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datakelas;
use App\Models\Datasiswa;
use illuminate\view\view;
use Illuminate\Support\Facades\DB;

class DatasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $datasiswa = Datasiswa::with('datakelas')->get()->groupBy('id_kelas');

        return view('adminpage.datasiswa', compact('datasiswa'));
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
        $datakelas = Datakelas::all();
        return view('adminpage.create', compact('datakelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // melakukan validasi data
        $request->validate(
            [
                'nis' => 'required|numeric',
                'nama' => 'required|max:255',
                'id_kelas' => 'required',
                'alamat' => 'required|max:255',
                'jenis_kelamin' => 'required|max:45',
            ],
            [
                'nis.required' => 'NIS wajib diisi',
                'nis.max' => 'NIS maksimal 11 karakter',
                'nama.required' => 'Nama wajib diisi',
                'id_kelas.required' => 'Kelas wajib diisi',
                'alamat.required' => 'Alamat wajib diisi',
                'alamat.max' => 'Alamat maksimal 255 karakter',
                'jenis_kelamin.required' => 'Jenis Kelamin harus diisi'
            ]
        );

        DB::table('datasiswas')->insert([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()
            ->route('datasiswa.index')
            ->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datasiswa $datasiswa)
    {
        //
        $datakelas = Datakelas::all();
        return view('adminpage.edit', compact('datasiswa', 'datakelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $datasiswa)
    {
        //
        $request->validate(
            [
                'nis' => 'required|numeric',
                'nama' => 'required|max:45',
                'id_kelas' => 'required',
                'alamat' => 'required|max:45',
                'jenis_kelamin' => 'required|max:45',

            ],
            [
                'nis.required' => 'NIS wajib diisi',
                'nis.max' => 'NIS maksimal 11 karakter',
                'nama.required' => 'Nama wajib diisi',
                'nama.max' => 'Jenis maksimal 255 karakter',
                'alamat.required' => 'Alamat wajib diisi',
                'alamat.max' => 'Alamat maksimal 255 karakter',
                'jenis_kelamin.required' => 'Jenis Kelamin harus diisi'
            ]
        );

        DB::table('datasiswas')->where('nis', $datasiswa)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('datasiswa.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datasiswa $datasiswa)
    {
        $datasiswa->delete();

        return redirect()->route('datasiswa.index')
            ->with('success', 'Data berhasil di hapus');
    }
}
