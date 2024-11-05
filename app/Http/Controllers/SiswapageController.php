<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;

class SiswapageController extends Controller
{
    //
    public function construct()
    {
        $this->middleware('CheckRole');
    }

    public function index()
    {
        return view('siswapage.index');
    }
}
