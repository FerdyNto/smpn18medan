<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKomunitas;
use App\Models\Ekstrakurikuler;
use App\Models\KategoriEkskul;
use App\Models\Komunitas;
use App\Models\KomunitasPost;
use App\Models\Kontak;

class KomunitasController extends Controller
{
    public function ekstrakurikuler()
    {
        return view('komunitas.ekskul.index', [
            'title' => 'Ekstrakurikuler',
            'active' => 'komunitas',
            'kat_eks' => KategoriEkskul::all()
        ]);
    }

    public function ekskul_detail($ekskul)
    {
        return view('komunitas.ekskul.ekskul', [
            'title' => 'Ekstrakurikuler',
            'active' => 'komunitas',
            'kat' => KategoriEkskul::where('id', $ekskul)->first(),
            'ekskul' => Ekstrakurikuler::with('kategoriekskul')->where('kategori_ekskul_id', $ekskul)->get()
        ]);
    }

    public function ekskul_show($id)
    {
        return view('komunitas.ekskul.show', [
            'title' => 'Ekstrakurikuler',
            'active' => 'komunitas',
            'ekskul' => Ekstrakurikuler::where('id', $id)->first()
        ]);
    }

    public function komunitas()
    {
        return view('komunitas.komunitas.index', [
            'title' => 'Komunitas Guru',
            'active' => 'komunitas',
            'komunitas_posts' => KomunitasPost::with('komunitas')->orderBy('created_at', 'desc')->paginate(5),
            'komunitas' => Komunitas::orderBy('nama_komunitas', 'asc')->get()
        ]);
    }

    public function komunitas_post_detail($slug)
    {
        return view('komunitas.komunitas.detail_komunitas_post', [
            'title' => 'Komunitas Guru',
            'active' => 'komunitas',
            'post' => KomunitasPost::with('komunitas')->where('slug', $slug)->first()
        ]);
    }

    public function komunitas_detail($id)
    {
        return view('komunitas.komunitas.detail', [
            'title' => 'Komunitas Guru',
            'active' => 'komunitas',
            'kom' => Komunitas::where('id', $id)->first(),
            'anggota' => AnggotaKomunitas::where('id_komunitas', $id)->get()
        ]);
    }
}
