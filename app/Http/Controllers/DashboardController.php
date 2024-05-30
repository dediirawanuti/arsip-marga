<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Arsip;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArsip = Arsip::count();
        $totalUser = User::count();
        $totalKategori = Kategori::count();
        
        return view(
            'dashboard',
            [
                'totalArsip' => $totalArsip,
                'totalUser' => $totalUser,
                'totalKategori' => $totalKategori,
            ]
        );
    }
}
