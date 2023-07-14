<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardInfoController extends Controller
{
    // Info
    public function index_info(Request $request)
    {
        $info = Berita::query();
        $info->when($request->info, function ($query) use ($request) {
            return $query->where('judul', 'like', "%" . $request->info . "%");
        });
        if (Auth::user()->lvl === 'administrator') {
            $data = $info->with('kategori', 'user')
                ->where('id_kategori', 2)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } elseif (Auth::user()->lvl === 'author') {
            $data = $info->with('kategori', 'user')
                ->where('id_user', Auth::user()->id)
                ->where('id_kategori', 2)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } else {
            echo 'User tidak ditemukan';
        }
        return view('dashboard.posts.info.index', [
            'title' => 'Info',
            'active' => 'info',
            'berita' => $data,

        ]);
    }

    public function create_info()
    {
        return view('dashboard.posts.info.create', [
            'title' => 'Tambah Info',
            'active' => 'info',
            'kategori' => Kategori::all(),

        ]);
    }
    public function store_info(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'slug' => 'required|unique:berita',
            'isi_berita' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'id_user' => 'required',
            'id_kategori' => 'required'
        ], [
            'judul.required' => 'Judul wajib diisi',
            'slug.required' => 'slug wajib diisi',
            'isi_berita.required' => 'Isi Berita wajib diisi',
            'gambar.required' => 'Gambar wajib diisi',
            'gambar.mimes' => 'Gambar harus berekstensi : jpg, jpeg, png',
            'id_kategori.required' => 'Kategori wajib diisi',
        ]);

        // Upload Gambar
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('img/berita/'), $gambar_nama);

        // Post Berita
        $berita = [
            'judul' => $request->input('judul'),
            'slug' => $request->input('slug'),
            'isi_berita' => $request->input('isi_berita'),
            'gambar' => $gambar_nama,
            'id_user' => $request->input('id_user'),
            'id_kategori' => $request->input('id_kategori')
        ];

        Berita::create($berita);
        return redirect()->route('info.index')->with('success', 'Berhasil Menambahkan Info Baru');
    }

    public function show_info($id)
    {
        return view('dashboard.posts.info.show', [
            'title' => 'Detail Info',
            'active' => 'Info',
            'berita' => Berita::with('kategori', 'user')->where('slug', $id)->first(),

        ]);
    }

    // Info
    public function edit_info($id)
    {
        $berita = Berita::with('kategori', 'user')->where('slug', $id)->first();
        return view('dashboard.posts.info.edit', [
            'title' => 'Edit Info',
            'active' => 'info',
            'kategori' => Kategori::all(),
            'berita' => $berita,

            // 'berita' => Berita::with('kategori', 'user')->where('slug', $id)->first()->get()
        ]);
    }
    public function update_info(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi_berita' => 'required',
            'id_user' => 'required',
            'id_kategori' => 'required'
        ], [
            'judul.required' => 'Judul wajib diisi',
            'isi_berita.required' => 'Isi Berita wajib diisi',
            'id_kategori.required' => 'Kategori wajib diisi',
        ]);

        $berita = [
            'judul' => $request->input('judul'),
            'isi_berita' => $request->input('isi_berita'),
            'id_user' => $request->input('id_user'),
            'id_kategori' => $request->input('id_kategori')
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'mimes:jpg,jpeg,png'
            ], [
                'gambar.mimes' => 'Gambar harus berekstensi : jpg, jpeg, png'
            ]);

            // Upload Gambar
            $gambar_file = $request->file('gambar');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
            $gambar_file->move(public_path('img/berita/'), $gambar_nama);
            //sudah terUpload ke direktori

            // hapus file lama
            $data_gambar = Berita::where('slug', $id)->first();
            File::delete(public_path('img/berita') . '/' . $data_gambar->gambar);

            // Upload file gambar baru
            $berita = [
                'gambar' => $gambar_nama
            ];
        }


        Berita::where('slug', $id)->update($berita);

        return redirect()->route('info.index')->with('success', 'Berhasil Edit Info');
    }
    public function destroy_info($id)
    {
        //delete image
        $berita = Berita::where('slug', $id)->first();
        File::delete(public_path('img/berita') . '/' . $berita->gambar);

        // Hapus Berita dari database
        Berita::where('slug', $id)->delete();
        return redirect()->route('info.index')->with('success', 'Berhasil Hapus Info');
    }
}
