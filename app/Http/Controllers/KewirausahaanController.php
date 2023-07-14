<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\Kewirausahaan;
use App\Models\Kontak;

class KewirausahaanController extends Controller
{
    public function index(Request $request)
    {
        $usaha = Kewirausahaan::query();
        $usaha->when($request->cari, function ($query) use ($request) {
            return $query->where('nama', 'like', '%' . $request->cari . '%');
        });
        $usaha->when($request->kategori, function ($query) use ($request) {
            return $query->where('kategori', 'like', '%' . $request->kategori . '%');
        });
        return view('kewirausahaan.kewirausahaan', [
            'title' => 'Kewirausahaan',
            'active' => 'kewirausahaan',
            'usaha' => $usaha->paginate(10),
            'berita' => Berita::limit(5)->orderBy('created_at', 'desc')->get()
        ]);
    }
}
