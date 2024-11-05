<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;

class AllabsensiController extends Controller
{
    public function index()
    {
        // Mengambil semua data absensi dengan user terkait
        $absensis = Absensi::with('user')->get();

        return view('absen.dataabsen', compact('absensis'));
    }
}
