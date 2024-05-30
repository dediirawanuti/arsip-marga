<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori,nama|regex:/^[a-zA-Z\s]+$/',
            'deskripsi' => 'unique:kategori,deskripsi|regex:/^[a-zA-Z\s]+$/',
        ]);

        Kategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($hashId)
    {
        $kategoris = Kategori::findByHashId($hashId);

        return view('kategori.edit', compact('kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $hashId)
    {
        $kategori = Kategori::findByHashId($hashId);

        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'deskripsi' => 'regex:/^[a-zA-Z\s]+$/',
        ]);

        $kategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($hashId)
    {
        // Temukan kategori berdasarkan ID
        $kategori = Kategori::findByHashId($hashId);

        // Hapus kategori
        $kategori->delete();

        // Redirect ke halaman index kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
