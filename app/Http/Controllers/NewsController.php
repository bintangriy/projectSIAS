<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    // Menyimpan data berita baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        // Menyimpan data
        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => $request->created_at,
        ]);

        // Redirect ke halaman berita
        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
}
