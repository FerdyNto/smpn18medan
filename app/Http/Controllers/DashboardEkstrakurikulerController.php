<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\KategoriEkskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardEkstrakurikulerController extends Controller
{
    public function index()
    {
        return view('dashboard.ekstrakurikuler.index', [
            'title' => 'Ekstrakurikuler',
            'active' => 'ekskul',
            'ekstrakurikuler' => Ekstrakurikuler::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.ekstrakurikuler.create', [
            'title' => 'Tambah Ekstrakurikuler',
            'active' => 'ekskul',
            'kategori_ekskul' => KategoriEkskul::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'slug' => 'required|unique:ekstrakurikulers',
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'link_daftar' => 'required',
            'pembina' => 'required',
            'kategori_ekskul_id' => 'required',
            'deskripsi' => 'required'
        ], [
            'nama.required' => 'Nama ekstrakurikuler harus diisi',
            'slug.unique' => 'Slug sudah digunakan',
            'gambar.required' => 'Gambar belum dipilih',
            'gambar.mimes' => 'Gambar harus berekstensi : jpg, jpeg, png',
            'link_daftar.required' => 'Link Pendaftaran harus diisi',
            'pembina.required' => 'Nama Pembina harus diisi',
            'kategori_ekskul_id.required' => 'Kategori belum dipilih',
            'deskripsi.required' => 'Deskripsi ekstrakurikuler harus diisi'
        ]);

        // Upload Gambar
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('img/ekskul/'), $gambar_nama);

        $ekstrakurikuler = [
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'slug' => $request->input('slug'),
            'gambar' => $gambar_nama,
            'link_daftar' => $request->input('link_daftar'),
            'pembina' => $request->input('pembina'),
            'kategori_ekskul_id' => $request->input('kategori_ekskul_id')
        ];

        Ekstrakurikuler::create($ekstrakurikuler);
        return redirect()->route('ekskul.index')->with('success', 'Berhasil Menambahkan Ekstrakurikuler');
    }

    public function edit($id)
    {
        return view('dashboard.ekstrakurikuler.edit', [
            'title' => 'Edit Ekstrakurikuler',
            'active' => 'ekskul',
            'kategori_ekskul' => KategoriEkskul::all(),
            'ekskul' => Ekstrakurikuler::with('kategoriekskul')->where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'slug' => 'required',
            'link_daftar' => 'required',
            'pembina' => 'required',
            'kategori_ekskul_id' => 'required',
            'deskripsi' => 'required'
        ], [
            'nama.required' => 'Nama ekstrakurikuler harus diisi',
            'link_daftar.required' => 'Link Pendaftaran harus diisi',
            'pembina.required' => 'Nama Pembina harus diisi',
            'kategori_ekskul_id.required' => 'Kategori belum dipilih',
            'deskripsi.required' => 'Deskripsi ekstrakurikuler harus diisi'
        ]);

        $ekstrakurikuler = [
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'slug' => $request->input('slug'),
            'link_daftar' => $request->input('link_daftar'),
            'pembina' => $request->input('pembina'),
            'kategori_ekskul_id' => $request->input('kategori_ekskul_id')
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
            $gambar_file->move(public_path('img/ekskul/'), $gambar_nama);
            //sudah terUpload ke direktori

            // hapus file lama
            $data_gambar = Ekstrakurikuler::where('id', $id)->first();
            File::delete(public_path('img/ekskul') . '/' . $data_gambar->gambar);

            // Upload file gambar baru
            $ekstrakurikuler = [
                'gambar' => $gambar_nama
            ];
        }

        Ekstrakurikuler::where('id', $id)->update($ekstrakurikuler);

        return redirect()->route('ekskul.index')->with('success', 'Berhasil Edit Ekstrakurikuler');
    }

    public function destroy($id)
    {
        //delete image
        $ekskul = Ekstrakurikuler::where('id', $id)->first();
        File::delete(public_path('img/ekskul') . '/' . $ekskul->gambar);
        // Hapus Ekstrakurikuler dari database
        Ekstrakurikuler::where('id', $id)->delete();
        return redirect()->route('ekskul.index')->with('success', 'Berhasil Hapus Ekstrakurikuler');
    }
}
