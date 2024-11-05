<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datasiswa;
use illuminate\view\view;
use Illuminate\Support\Facades\DB;

class Datasiswa2Controller extends Controller
{
    //
    public function index(): view
    {
        $datasiswa = Datasiswa::all();
        return view('siswapage.datasiswa2', compact('datasiswa'));
    }
}
