<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\view\view;
use Illuminate\Support\Facades\DB;

class AdduserController extends Controller
{
    public function index(): view
    {
        $users = User::orderBy('role', 'asc')->get();
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

    public function edit(User $users)
    {
        //
        return view('adminpage.edituser', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $users)
    {
        //
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'role' => ['required', 'in:admin,guru,siswa'],
            ],
        );

        DB::table('users')->where('id', $users)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request['role'],
        ]);

        return redirect()->route('adduser.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $users)
    {
        //
        $users->delete();

        return redirect()->route('adduser.index')
            ->with('success', 'Data berhasil di hapus');
    }
}
