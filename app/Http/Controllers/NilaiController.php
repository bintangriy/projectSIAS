<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::all();
        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        return view('nilai.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|max:20',
            'ppkn' => 'required|numeric',
            'b_indo' => 'required|numeric',
            'agama' => 'required|numeric',
            'mtk' => 'required|numeric',
            'ipa' => 'required|numeric',
            'ips' => 'required|numeric',
            'b_inggris' => 'required|numeric',
        ]);

        $validated['rata_rata'] = collect($validated)->except(['nis', 'nama', 'gender'])->avg();

        Nilai::create($validated);

        return redirect()->route('nilai.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($nilais)
    {
        $nilais = Nilai::findOrFail($nilais);
        return view('nilai.edit', compact('nilais'));
    }

    public function update(Request $request, $nilais)
    {
        $nilais = Nilai::findOrFail($nilais);

        $validated = $request->validate([
            'nis' => 'required|max:20',
            'ppkn' => 'required|numeric',
            'b_indo' => 'required|numeric',
            'agama' => 'required|numeric',
            'mtk' => 'required|numeric',
            'ipa' => 'required|numeric',
            'ips' => 'required|numeric',
            'b_inggris' => 'required|numeric',
        ]);

        $validated['rata_rata'] = collect($validated)->except(['nis'])->avg();

        $nilais->update($validated);

        return redirect()->route('nilai.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Nilai $nilais)
    {
        //
        $nilais->delete();

        return redirect()->route('nilai.index')
            ->with('success', 'Data berhasil di hapus');
    }
}
