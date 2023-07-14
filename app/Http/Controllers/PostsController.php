<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function cari_berita(Request $request)
    {
        $cari = $request->input('cari');

        $berita = Berita::where('id_kategori', '1')
            ->where('judul', 'like', "%" . $cari . "%")
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('post.berita', [
            'title' => 'Berita',
            'active' => 'berita',
            'berita' => $berita,
            'cari_aktif' => 'berita',
        ]);
    }

    public function cari_info(Request $request)
    {
        $cari = $request->input('cari');
        $info = Berita::where('id_kategori', '2')
            ->where('judul', 'like', "%" . $cari . "%")
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('post.info', [
            'title' => 'Berita',
            'active' => 'berita',
            'berita' => $info,
            'cari_aktif' => 'info',
        ]);
    }

    public function index()
    {
        return view(
            'post.berita',
            [
                'title' => 'Berita / Info',
                'active' => 'berita',
                'berita' => Berita::where('id_kategori', '1')->orderBy('created_at', 'desc')->paginate(6),
                'cari_aktif' => 'berita',
            ]
        );
    }

    public function info()
    {
        return view(
            'post.info',
            [
                'title' => 'Berita / Info',
                'active' => 'berita',
                'berita' => Berita::where('id_kategori', '2')->orderBy('created_at', 'desc')->paginate(6),
                'cari_aktif' => 'info',
            ]
        );
    }

    public function showBerita($slug)
    {
        $berita = Berita::with('kategori', 'user')->where('slug', $slug)->first();
        return view('post.detail_post', [
            'title' => $berita->judul,
            'k' => 'berita',
            'active' => 'berita',
            'berita' => $berita,
        ]);
    }

    public function showInfo($slug)
    {
        $berita = Berita::with('kategori', 'user')->where('slug', $slug)->first();
        return view('post.detail_post', [
            'title' => $berita->judul,
            'k' => 'info',
            'active' => 'berita',
            'berita' => $berita,
        ]);
    }
}
