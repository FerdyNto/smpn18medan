<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKomunitas;
use App\Models\Komunitas;
use App\Models\KomunitasPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardKomunitasController extends Controller
{
    public function komunitas_posts(Request $request)
    {
        $posts = KomunitasPost::query();
        $posts->when($request->komunitas, function ($query) use ($request) {
            return $query->where('judul', 'like', "%" . $request->komunitas . "%");
        });
        return view('dashboard.posts.komunitas.index', [
            'title' => 'Komunitas Guru',
            'active' => 'komunitas-posts',
            'posts' => $posts->with('komunitas')->orderBy('created_at', 'desc')->paginate(6)
        ]);
    }

    public function komunitas_post_create()
    {
        return view('dashboard.posts.komunitas.create', [
            'title' => 'Tambah Berita Komunitas Guru',
            'active' => 'komunitas-posts',
            'komunitas' => Komunitas::all()
        ]);
    }

    public function komunitas_post_store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'slug' => 'required|unique:komunitas_posts',
            'isi_post' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'komunitas' => 'required'
        ], [
            'judul.required' => 'Judul harus diisi',
            'slug.required' => 'slug harus terisi',
            'slug.unique' => 'slug sudah digunakan',
            'isi_post.required' => 'Isi post harus diisi',
            'gambar.required' => 'Gambar harus diisi',
            'gambar.mimes' => 'Gambar harus berekstensi: jpg, jpeg, png',
            'komunitas.required' => 'Komunitas harus dipilih'
        ]);

        // Upload Gambar
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('img/komunitas/'), $gambar_nama);

        $komunitas = [
            'judul' => $request->input('judul'),
            'slug' => $request->input('slug'),
            'isi_post' => $request->input('isi_post'),
            'gambar' => $gambar_nama,
            'id_komunitas' => $request->input('komunitas')
        ];

        KomunitasPost::create($komunitas);
        return redirect()->route('komunitas_posts.index')->with('success', 'Berhasil menambahkan berita Komunitas Baru');
    }

    public function komunitas_post_edit($slug)
    {
        return view('dashboard.posts.komunitas.edit', [
            'title' => 'Edit Data Berita Komunitas',
            'active' => 'komunitas-posts',
            'post' => KomunitasPost::where('slug', $slug)->first(),
            'komunitas' => Komunitas::all()
        ]);
    }

    public function komunitas_post_update(Request $request, $slug)
    {
        $request->validate([
            'judul' => 'required',
            'slug' => 'required',
            'isi_post' => 'required',
            'komunitas' => 'required'
        ], [
            'judul.required' => 'Judul harus diisi',
            'slug.required' => 'slug harus terisi',
            'isi_post.required' => 'Isi post harus diisi',
            'komunitas.required' => 'Komunitas harus dipilih'
        ]);

        $komunitas = [
            'judul' => $request->input('judul'),
            'slug' => $request->input('slug'),
            'isi_post' => $request->input('isi_post'),
            'id_komunitas' => $request->input('komunitas')
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
            $gambar_file->move(public_path('img/komunitas/'), $gambar_nama);
            //sudah terUpload ke direktori

            // hapus file lama
            $data_gambar = KomunitasPost::where('slug', $slug)->first();
            File::delete(public_path('img/komunitas') . '/' . $data_gambar->gambar);

            // Upload file gambar baru
            $komunitas = [
                'gambar' => $gambar_nama
            ];
        }
        KomunitasPost::where('slug', $slug)->update($komunitas);
        return redirect()->route('komunitas_posts.index')->with('success', 'Berhasil ubah berita Komunitas');
    }

    public function komunitas_post_destroy($slug)
    {
        //delete image
        $komunitas = KomunitasPost::where('slug', $slug)->first();
        File::delete(public_path('img/komunitas') . '/' . $komunitas->gambar);
        // Hapus Ekstrakurikuler dari database
        KomunitasPost::where('slug', $slug)->delete();
        return redirect()->route('komunitas_posts.index')->with('success', 'Berhasil Hapus Berita Komunitas');
    }

    public function index()
    {
        return view('dashboard.komunitas.index', [
            'title' => 'Komunitas',
            'active' => 'komunitas',
            'komunitas' => Komunitas::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.komunitas.create', [
            'title' => 'Tambah Komunitas',
            'active' => 'komunitas'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_komunitas' => 'required',
            'slug' => 'required|unique:komunitas',
            'deskripsi' => 'required',
            'link_daftar' => 'required',
            'gambar' => 'required|mimes:jpg,png,jpeg'
        ], [
            'nama_komunitas.required' => 'Nama Komunitas harus diisi',
            'slug.required' => 'Slug harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'gambar.required' => 'Gambar harus diisi',
            'gambar.mimes' => 'Gambar harus berekstensi : jpg, jpeg, png',
            'link_daftar.required' => 'Link Pendaftaran harus diisi'
        ]);

        // Upload Gambar
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('img/komunitas/'), $gambar_nama);

        $komunitas = [
            'nama_komunitas' => $request->input('nama_komunitas'),
            'slug' => $request->input('slug'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $gambar_nama,
            'link_daftar' => $request->input('link_daftar')
        ];

        Komunitas::create($komunitas);
        return redirect()->route('komunitas.index')->with('success', 'Berhasil menambahkan Komunitas Baru');
    }

    public function edit($slug)
    {
        return view('dashboard.komunitas.edit', [
            'title' => 'Edit Komunitas',
            'active' => 'komunitas',
            'komunitas' => Komunitas::where('slug', $slug)->first()
        ]);
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'nama_komunitas' => 'required',
            'deskripsi' => 'required',
            'link_daftar' => 'required'
        ], [
            'nama_komunitas.required' => 'Nama Komunitas harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'link_daftar.required' => 'Link Pendaftaran harus diisi'
        ]);

        $komunitas = [
            'nama_komunitas' => $request->input('nama_komunitas'),
            'slug' => $request->input('slug'),
            'deskripsi' => $request->input('deskripsi'),
            'link_daftar' => $request->input('link_daftar')
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
            $gambar_file->move(public_path('img/komunitas/'), $gambar_nama);
            //sudah terUpload ke direktori

            // hapus file lama
            $data_gambar = Komunitas::where('slug', $slug)->first();
            File::delete(public_path('img/komunitas') . '/' . $data_gambar->gambar);

            // Upload file gambar baru
            $komunitas = [
                'gambar' => $gambar_nama
            ];
        }

        Komunitas::where('slug', $slug)->update($komunitas);
        return redirect()->route('komunitas.index')->with('success', 'Berhasil Edit Komunitas');
    }

    public function destroy($slug)
    {
        //delete image
        $komunitas = Komunitas::where('slug', $slug)->first();
        File::delete(public_path('img/komunitas') . '/' . $komunitas->gambar);
        // Hapus Ekstrakurikuler dari database
        Komunitas::where('slug', $slug)->delete();
        return redirect()->route('komunitas.index')->with('success', 'Berhasil Hapus Komunitas');
    }

    public function anggota(Request $request, $id)
    {
        $anggota = AnggotaKomunitas::query();
        $anggota->when($request->anggota, function ($query) use ($request) {
            return $query->where('nama_anggota', 'like', "%" . $request->anggota . "%");
        });
        return view('dashboard.komunitas.anggota', [
            'title' => 'Anggota Komunitas',
            'active' => 'komunitas',
            'komunitas' => Komunitas::where('id', $id)->first(),
            'anggota' => $anggota->where('id_komunitas', $id)->get()
        ]);
    }

    public function create_anggota()
    {
        return view('dashboard.komunitas.anggota_create', [
            'title' => 'Tambah Anggota Komunitas',
            'active' => 'komunitas',
            'komunitas' => Komunitas::all()
        ]);
    }

    public function store_anggota(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'jabatan' => 'required',
            'komunitas' => 'required'
        ], [
            'nama_anggota.required' => 'Nama anggota harus diisi',
            'jabatan.required' => 'Jabatan harus diisi',
            'komunitas.required' => 'Komunitas harus dipilih'
        ]);

        $anggota = [
            'nama_anggota' => $request->input('nama_anggota'),
            'jabatan' => $request->input('jabatan'),
            'id_komunitas' => $request->input('komunitas')
        ];
        AnggotaKomunitas::create($anggota);
        return redirect()->route('komunitas.index')->with('success', 'Berhasil menambahkan anggota baru');
    }

    public function edit_anggota($id)
    {
        return view('dashboard.komunitas.anggota_edit', [
            'title' => 'Edit Data Anggota Komunitas',
            'active' => 'komunitas',
            'anggota' => AnggotaKomunitas::where('id', $id)->first(),
            'komunitas' => Komunitas::all()
        ]);
    }

    public function update_anggota(Request $request, $id)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'jabatan' => 'required',
            'komunitas' => 'required'
        ], [
            'nama_anggota.required' => 'Nama anggota harus diisi',
            'jabatan.required' => 'Jabatan harus diisi',
            'komunitas.required' => 'Komunitas harus dipilih'
        ]);

        $anggota = [
            'nama_anggota' => $request->input('nama_anggota'),
            'jabatan' => $request->input('jabatan'),
            'id_komunitas' => $request->input('komunitas')
        ];

        AnggotaKomunitas::where('id', $id)->update($anggota);
        return redirect()->route('komunitas.index')->with('success', 'Berhasil ubah data anggota');
    }

    public function destroy_anggota($id)
    {
        AnggotaKomunitas::where('id', $id)->delete();
        return redirect()->route('komunitas.index')->with('success', 'Berhasil menghapus data anggota');
    }
}
