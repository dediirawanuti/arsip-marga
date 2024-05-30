<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        return view('users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|unique:users,email',
            'usertype' => 'required|in:user,admin',
            'password' => 'required|min:8|confirmed'
        ]);

        // Hash password sebelum disimpan
        $plainPassword = $request->password;
        // $hashedPassword = bcrypt($request->password);

        // Buat pengguna baru dan simpan ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => Hash::make($plainPassword),
            'plain_password' => $plainPassword
        ]);

        return redirect()->route('user.index')->with('success', 'Users berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($hashId)
    {
        $users = User::findByHashId($hashId);

        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $hashId)
    {
        $users = User::findByHashId($hashId);

        $request->validate([
            'name' => 'unique:users,name|regex:/^[a-zA-Z\s]+$/',
            'email' => 'unique:users,email',
            'usertype' => 'in:user,admin',
        ]);

        $users::update([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('user.index')->with('success', 'Users berhasil Ubah');
    }

    public function password()
    {
        return view('users.gantipassword');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($hashId)
    {
        // Temukan kategori berdasarkan ID
        $users = User::findByHashId($hashId);

        // Hapus kategori
        $users->delete();

        // Redirect ke halaman index kategori dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Users berhasil dihapus');
    }
}
