<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRole;
use App\Models\Absensi;
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
        return view('adminpage.index');
    }
}
