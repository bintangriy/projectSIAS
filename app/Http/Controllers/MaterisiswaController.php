<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use App\Models\Dataguru;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaterisiswaController extends Controller
{
    public function index()
    {
        $materis = Materi::with('dataguru')->get();
        return view('materi.materisiswa', compact('materis'));
    }

    // Download materi
    // Download materi
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
}
