<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class DashboardBeritaController extends Controller
{
    // Berita
    public function index_berita(Request $request)
    {
        $berita = Berita::query();
        $berita->when($request->berita, function ($query) use ($request) {
            return $query->where('judul', 'like', "%" . $request->berita . "%");
        });
        if (Auth::user()->lvl === 'administrator') {
            $data =  $berita
                ->with('kategori', 'user')
                ->where('id_kategori', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        } elseif (Auth::user()->lvl === 'author') {
            $data =  $berita->with('kategori', 'user')
                ->where('id_kategori', 1)
                ->where('judul', 'like', "%" . $request->berita . "%")
                ->where('id_user', Auth::user()->id)
                ->paginate(6);
        } else {
            echo 'User tidak ditemukan';
        }
        return view('dashboard.posts.berita.index', [
            'title' => 'Berita',
            'active' => 'berita',
            'berita' => $data
        ]);
    }


    public function create_berita()
    {
        return view('dashboard.posts.berita.create', [
            'title' => 'Tambah Berita',
            'active' => 'berita',
            'kategori' => Kategori::all(),

        ]);
    }

    public function store_berita(Request $request)
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
        return redirect()->route('berita.index')->with('success', 'Berhasil Menambahkan Berita Baru');
    }


    public function show_berita($id)
    {
        return view('dashboard.posts.berita.show', [
            'title' => 'Detail Berita',
            'active' => 'berita',
            'berita' => Berita::with('kategori', 'user')->where('slug', $id)->first(),
        ]);
    }
    //  Berita
    public function edit_berita($id)
    {
        $berita = Berita::with('kategori', 'user')->where('slug', $id)->first();
        return view('dashboard.posts.berita.edit', [
            'title' => 'Edit Berita',
            'active' => 'berita',
            'kategori' => Kategori::all(),
            'berita' => $berita,

            // 'berita' => Berita::with('kategori', 'user')->where('slug', $id)->first()->get()
        ]);
    }


    public function update_berita(Request $request, $id)
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

        return redirect()->route('berita.index')->with('success', 'Berhasil Edit Berita');
    }

    public function destroy_berita($id)
    {
        //delete image
        $berita = Berita::where('slug', $id)->first();
        File::delete(public_path('img/berita') . '/' . $berita->gambar);

        // Hapus Berita dari database
        Berita::where('slug', $id)->delete();
        return redirect()->route('berita.index')->with('success', 'Berhasil Hapus Berita');
    }
}
