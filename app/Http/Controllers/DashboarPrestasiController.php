<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use Illuminate\Support\Facades\File;

class DashboarPrestasiController extends Controller
{
    public function index(Request $request)
    {
        $prestasi = Prestasi::query();
        $prestasi->when($request->prestasi, function ($query) use ($request) {
            return $query->where('judul', 'like', '%' . $request->prestasi . '%');
        });
        $data = $prestasi->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('dashboard.prestasi.index', [
            'title' => 'Prestasi',
            'active' => 'prestasi',
            'prestasi' => $data,
        ]);
    }

    public function create()
    {
        return view('dashboard.prestasi.create', [
            'title' => 'Tambah Prestasi',
            'active' => 'prestasi',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'slug' => 'required|unique:berita',
            'deskripsi' => 'required',
            'anggota' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'id_user' => 'required'
        ], [
            'judul.required' => 'Judul wajib diisi',
            'slug.required' => 'slug wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'anggota.required' => 'Anggota wajib diisi',
            'gambar.required' => 'Gambar wajib diisi',
            'gambar.mimes' => 'Gambar harus berekstensi : jpg, jpeg, png',
        ]);

        // Upload Gambar
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('img/prestasi/'), $gambar_nama);

        // Post Berita
        $prestasi = [
            'judul' => $request->input('judul'),
            'slug' => $request->input('slug'),
            'deskripsi' => $request->input('deskripsi'),
            'anggota' => $request->input('anggota'),
            'gambar' => $gambar_nama,
            'id_user' => $request->input('id_user')
        ];

        Prestasi::create($prestasi);
        return redirect()->route('prestasi.index')->with('success', 'Berhasil Menambahkan Prestasi');
    }

    public function show($id)
    {
        return view('dashboard.prestasi.show', [
            'title' => 'Detail Prestasi',
            'active' => 'prestasi',
            'prestasi' => Prestasi::with('user')->where('slug', $id)->first(),

        ]);
    }

    public function edit($id)
    {
        $prestasi = Prestasi::with('user')->where('slug', $id)->first();
        return view('dashboard.prestasi.edit', [
            'title' => 'Edit Prestasi',
            'active' => 'prestasi'
        ])->with('prestasi', $prestasi);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'anggota' => 'required',
            'id_user' => 'required'
        ], [
            'judul.required' => 'Judul wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'anggota.required' => 'Anggota wajib diisi'
        ]);

        $prestasi = [
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'anggota' => $request->input('anggota'),
            'id_user' => $request->input('id_user')
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
            $gambar_file->move(public_path('img/prestasi/'), $gambar_nama);
            //sudah terUpload ke direktori

            // hapus file lama
            $data_gambar = Prestasi::where('slug', $id)->first();
            File::delete(public_path('img/prestasi') . '/' . $data_gambar->gambar);

            // Upload file gambar baru
            $prestasi = [
                'gambar' => $gambar_nama
            ];
        }

        Prestasi::where('slug', $id)->update($prestasi);
        return redirect()->route('prestasi.index')->with('success', 'Berhasil Edit Prestasi');
    }

    public function destroy($id)
    {
        //delete image
        $prestasi = Prestasi::where('slug', $id)->first();
        File::delete(public_path('img/prestasi') . '/' . $prestasi->gambar);

        // Hapus Prestasi dari database
        Prestasi::where('slug', $id)->delete();
        return redirect()->route('prestasi.index')->with('success', 'Berhasil Hapus Prestasi');
    }
}
