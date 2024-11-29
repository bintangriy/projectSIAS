<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use App\Models\Dataguru;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MateriguruController extends Controller
{
    public function index()
    {
        $materis = Materi::with('dataguru')->get();
        return view('materi.materiguru', compact('materis'));
    }

    public function download($id)
    {
        $materi = Materi::findOrFail($id);

        // Pastikan 'file_path' adalah path ke file yang ingin diunduh
        $filePath = storage_path('public/' . $materi->uploads);

        // Cek apakah file ada
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }

    public function create()
    {
        $gurus = Dataguru::all();
        return view('materi.createguru', compact('gurus'));
    }

    // Simpan materi yang diupload
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'nip' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Proses unggah file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Menyimpan ke storage dengan disk 'public'

            // Simpan data ke database
            Materi::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'nip' => $request->nip,
                'file' => $filePath,
            ]);
        }

        return redirect()->back()->with('error', 'Gagal mengunggah file.');
    }
}
