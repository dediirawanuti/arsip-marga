<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $arsip = Arsip::select('arsip.*', 'kategori.nama AS nama_kategori')
        //     ->join('kategori', 'arsip.kategori_id', '=', 'kategori.id')
        //     ->get();

        
        $arsip = Arsip::all();
        return view('arsip.index', ['arsip' => $arsip]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('arsip.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|regex:/^[0-9a-zA-Z\s]+$/',
            'file' => 'required|file',
            // 'kategori_id' => 'required|exists:kategori,id',
            'status' => 'required|in:draft,published'
        ]);

        $path = $request->file('file')->store('arsip', 'public');

        Arsip::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            // 'kategori_id' => $request->kategori_id,
            'file_path' => $path,
            'status' => $request->status
        ]);

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($hashId)
    {
        $arsip = Arsip::findByHashId($hashId);

        return view('arsip.show', compact('arsip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($hashId)
    {
        $arsip = Arsip::findByHashId($hashId);
        $kategori = Kategori::all();
        return view('arsip.edit', compact('arsip', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $hashId)
    {
        $arsip = Arsip::findByHashId($hashId);

        $request->validate([
            'judul' => 'required|regex:/^[0-9a-zA-Z\s]+$/',
            'file' => 'file',
            // 'kategori_id' => 'required|exists:kategori,id',
            'status' => 'required|in:draft,published'
        ]);

        if ($request->hasFile('file')) {
            // Simpan file ke disk 'public'
            $path = $request->file('file')->store('arsip', 'public');
            $arsip->file_path = $path;
        }

        $arsip->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'status' => $request->status
        ]);

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($hashId)
    {
        $arsip = Arsip::findByHashId($hashId);

        if ($arsip) {
            // Hapus file dari storage jika ada
            if ($arsip->file_path && Storage::disk('public')->exists($arsip->file_path)) {
                Storage::disk('public')->delete($arsip->file_path);
            }

            $arsip->delete();

            return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus');
        } else {
            return redirect()->route('arsip.index')->with('error', 'Arsip tidak ditemukan');
        }
    }
}
