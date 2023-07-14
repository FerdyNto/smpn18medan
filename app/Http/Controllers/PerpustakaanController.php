<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kontak;
use App\Models\Mapel;
use App\Models\Perpus;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function index(Request $request)
    {
        $perpus = Perpus::query();
        $perpus->when($request->cari, function ($query) use ($request) {
            return $query->where('nama_buku', 'like', '%' . $request->cari . '%');
        });
        return view('perpus.index', [
            'title' => 'Perpustakaan Buku / Modul',
            'active' => 'perpus',
            'perpus' => $perpus->with('mapel', 'kelas')->orderBy('id_mapel', 'asc')->paginate(10),
            'berita' => Berita::limit(5)->orderBy('created_at', 'desc')->get()
        ]);
    }
}
