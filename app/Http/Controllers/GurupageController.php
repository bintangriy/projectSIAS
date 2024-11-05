<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRole;

use Illuminate\Http\Request;

class GurupageController extends Controller
{

    public function construct()
    {
        $this->middleware('CheckRole');
    }

    public function index()
    {
        return view('gurupage.index');
    }
}
