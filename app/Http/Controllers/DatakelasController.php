<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datakelas;
use Illuminate\Support\Facades\DB;

class DatakelasController extends Controller
{
    public function index()
    {
        $datakelas = Datakelas::all();
        return view('datakelas.index', compact('datakelas'));
    }



    public function create()
    {
        return view('datakelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required',
            'kelas' => 'required',
        ]);

        Datakelas::create($request->all());
        return redirect()->route('datakelas.index')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    public function edit(Datakelas $datakelas)
    {
        //
        return view('datakelas.edit', compact('datakelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $datakelas)
    {
        //
        $request->validate(
            [
                'id_kelas' => 'required',
                'kelas' => 'required',

            ],
        );

        DB::table('datakelas')->where('id_kelas', $datakelas)->update([
            'id_kelas' => $request->id_kelas,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('datakelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datakelas $datakelas)
    {
        //
        $datakelas->delete();

        return redirect()->route('datakelas.index')
            ->with('success', 'Data berhasil di hapus');
    }
}
