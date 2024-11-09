<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    // Tampilkan halaman upload materi untuk guru
    public function create()
    {
        return view('materi.create');
    }

    // Simpan materi yang diupload
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Sesuaikan tipe file dan ukuran maksimal
        ]);

        // Proses unggah file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/materi', $fileName, 'public'); // Menyimpan ke storage dengan disk 'public'

            // Simpan data ke database
            Materi::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'file' => $filePath,
                'nip' => Auth::user()->nip, // Pastikan nip terisi dengan benar
            ]);

            return redirect()->route('materi.index')->with('status', 'Materi berhasil diunggah!');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah file.');
    }


    // Tampilkan semua materi untuk siswa
    public function index()
    {
        $materis = Materi::all();
        return view('materi.index', compact('materis'));
    }

    // Download materi
    public function download($id)
    {
        $materi = Materi::findOrFail($id);
        return response()->download($materi);
    }
}
