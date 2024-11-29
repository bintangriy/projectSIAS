<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AbsensiswaController extends Controller
{
    public function index()
    {
        $absensis = Absensi::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        foreach ($absensis as $absensi) {
            if (is_null($absensi->user_id)) {
                Log::info("User tidak ditemukan untuk absensi ID: {$absensi->id}");
            }
        }

        return view('absen.indexsiswa', compact('absensis'));
    }

    public function create()
    {
        return view('absen.kamerasiswa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'foto' => 'required'
        ]);

        // Proses Base64 untuk disimpan sebagai file gambar
        $image = $request->foto; // Mendapatkan base64
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'foto_absensi/' . uniqid() . '.jpg';
        Storage::disk('public')->put($imageName, base64_decode($image));

        // Simpan data absensi
        Absensi::create([
            'user_id' => Auth::id(),
            'tanggal_absensi' => now()->toDateString(),
            'jam_absensi' => now()->toTimeString(),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'foto' => $imageName,
        ]);

        return redirect()->route('absensiswa.index')->with('status', 'Absensi berhasil!');
    }
}
