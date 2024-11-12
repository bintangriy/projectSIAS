<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdduserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data user
        return view('adminpage.tabeluser', compact('users'));
    }

    public function create()
    {
        return view('adminpage.registeruser');
    }

    public function store(Request $data)
    {
        $data->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => ['required', 'in:admin,guru,siswa'],
        ]);

        User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
            'role' => $data['role'],
        ]);

        return redirect()->route('adminpage.tabeluser')->with('status', 'User berhasil ditambahkan!');
    }
}
