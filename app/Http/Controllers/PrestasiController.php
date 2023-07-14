<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        return view('prestasi.prestasi', [
            'title' => 'Prestasi',
            'active' => 'prestasi',
            'prestasi' => Prestasi::orderBy('created_at', 'desc')->paginate(6)
        ]);
    }

    public function show($slug)
    {
        $prestasi = Prestasi::where('slug', $slug)->first();
        return view('prestasi.detail_prestasi', [
            'title' => $prestasi->judul,
            'active' => 'prestasi',
            'prestasi' => $prestasi
        ]);
    }
}
