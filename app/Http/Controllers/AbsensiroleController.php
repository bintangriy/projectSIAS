<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;

class AbsensiroleController extends Controller
{
    public function absensiGuru()
    {
        // Ambil absensi yang dimiliki oleh pengguna dengan role 'guru'
        $absensiGuru = Absensi::whereHas('user', function ($query) {
            $query->where('role', 'guru');
        })->get();

        return view('absen.absenguru', compact('absensiGuru'));
    }

    public function absensiSiswa()
    {
        // Ambil absensi yang dimiliki oleh pengguna dengan role 'siswa'
        $absensiSiswa = Absensi::whereHas('user', function ($query) {
            $query->where('role', 'siswa');
        })->get();

        return view('absen.absensiswa', compact('absensiSiswa'));
    }
}
