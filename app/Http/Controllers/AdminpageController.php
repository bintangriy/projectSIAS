<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRole;
use App\Models\Absensi;
use App\Models\Allabsensi;
use App\Models\Dataguru;
use App\Models\Datasiswa;
use App\Models\User;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminpageController extends Controller
{

    public function construct()
    {
        $this->middleware('CheckRole');
    }

    public function index()
    {
        $data = [
            'siswa_count' => Datasiswa::count(),
            'guru_count' => Dataguru::count(),
            'admin_count' => User::where('role', 'admin')->count(),
            'mapel_count' => Mapel::count(),
        ];

        $absensis = Absensi::orderBy('created_at', 'desc')->get();

        return view('adminpage.index', compact('data', 'absensis'));
    }
}
