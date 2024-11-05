<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dataguru;
use App\Models\Datasiswa;
use illuminate\view\view;
use Illuminate\Support\Facades\DB;

class DataguruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        //
        $dataguru = Dataguru::all();
        return view('adminpage.dataguru', compact('dataguru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('adminpage.create1');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'nip' => 'required|numeric',
                'nama' => 'required|max:255',
                'pendidikan' => 'required|max:45',
                'jabatan' => 'required|max:45',
            ],
            [
                'nip.required' => 'NIP wajib diisi',
                'nip.max' => 'NIP maksimal 11 karakter',
                'nama.required' => 'Nama wajib diisi',
                'nama.max' => 'Nama maksimal 255 karakter',
                'pendidikan.required' => 'Pendidikan wajib diisi',
                'pendidikan.max' => 'Pendidikan maksimal 45 karakter',
                'jabatan.required' => 'Jabatan harus diisi'
            ]
        );

        DB::table('datagurus')->insert([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'pendidikan' => $request->pendidikan,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()
            ->route('dataguru.index')
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
    public function edit(Dataguru $dataguru)
    {
        //
        return view('adminpage.edit1', compact('dataguru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $dataguru)
    {
        //
        $request->validate(
            [
                'nip' => 'required|numeric',
                'nama' => 'required|max:255',
                'pendidikan' => 'required|max:45',
                'jabatan' => 'required|max:45',

            ],
            [
                'nip.required' => 'NIP wajib diisi',
                'nip.max' => 'NIP maksimal 11 karakter',
                'nama.required' => 'Nama wajib diisi',
                'nama.max' => 'Nama maksimal 255 karakter',
                'pendidikan.required' => 'Pendidikan wajib diisi',
                'pendidikan.max' => 'Pendidikan maksimal 255 karakter',
                'jabatan.required' => 'Jenis Kelamin harus diisi'
            ]
        );

        DB::table('datagurus')->where('nip', $dataguru)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'pendidikan' => $request->pendidikan,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('dataguru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dataguru $dataguru)
    {
        //
        $dataguru->delete();

        return redirect()->route('dataguru.index')
            ->with('success', 'Data berhasil di hapus');
    }
}
