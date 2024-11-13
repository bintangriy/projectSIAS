<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewssiswaController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('newssiswa.index', compact('news'));
    }


    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('newssiswa.show', compact('news'));
    }
}
