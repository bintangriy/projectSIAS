<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Dataguru;

class MapelController extends Controller
{
    public function index()
    {
        // Ambil data mapel dengan data guru terkait
        $mapel = Mapel::with('guru')->get();
        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        $gurus = Dataguru::all(); // Ambil semua guru
        return view('mapel.create', compact('gurus'));
    }

    public function edit(Mapel $mapel)
    {
        $gurus = Dataguru::all(); // Ambil semua guru
        return view('mapel.edit', compact('mapel', 'gurus'));
    }

    public function store() {}

    public function destroy($id)
    {
        try {
            $mapel = Mapel::findOrFail($id);

            $mapel->delete();

            return redirect()->route('mapel.index')->with('success', 'Data mata pelajaran berhasil dihapus.');
        } catch (\Exception $e) {

            return redirect()->route('mapel.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
