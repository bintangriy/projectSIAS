<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsguruController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('newsguru.index', compact('news'));
    }


    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('newsguru.show', compact('news'));
    }
}
