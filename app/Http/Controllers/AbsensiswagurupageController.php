<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;

class AbsensiswagurupageController extends Controller
{

    public function absensiswa()
    {
        // Ambil absensi yang dimiliki oleh pengguna dengan role 'siswa'
        $absensiSiswa = Absensi::whereHas('user', function ($query) {
            $query->where('role', 'siswa');
        })->get();

        return view('gurupage.absensiswa', compact('absensiSiswa'));
    }
}
