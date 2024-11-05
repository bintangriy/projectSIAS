<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datasiswa;
use illuminate\view\view;
use Illuminate\Support\Facades\DB;

class Datasiswa1Controller extends Controller
{
    //
    public function index(): view
    {
        $datasiswa = Datasiswa::all();
        return view('gurupage.datasiswa1', compact('datasiswa'));
    }
}
