<?php

namespace App\Http\Controllers;

use App\Models\KategoriEkskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardKategoriEkskulController extends Controller
{
    public function index()
    {
        return view('dashboard.kategoriEkskul.index', [
            'title' => 'Kategori Ekstrakurikuler',
            'active' => 'kategori-ekskul',
            'kategorieks' => KategoriEkskul::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.kategoriEkskul.create', [
            'title' => 'Tambah Kategori Ekskul',
            'active' => 'kategori-ekskul'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_ekskul' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png'
        ], [
            'nama_kategori_ekskul.required' => 'Nama Kategori Ekskul harus diisi',
            'gambar.required' => 'Gambar harus diisi',
            'gambar.mimes' => 'Gambar harus berekstensi jpg, jpeg, png'
        ]);

        // Upload Gambar
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('img/ekskul/'), $gambar_nama);

        $data = [
            'nama_kategori_ekskul' => $request->input('nama_kategori_ekskul'),
            'gambar' => $request->input('gambar')
        ];

        KategoriEkskul::create($data);
        return redirect()->route('kategoriekskul.index')->with('success', 'Berhasil menambahkan kategori ekskul');
    }

    public function edit($id)
    {
        return view('dashboard.kategoriEkskul.edit', [
            'title' => 'Edit Kategori Ekskul',
            'active' => 'kategori-ekskul',
            'kat_eks' => KategoriEkskul::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_ekskul' => 'required'
        ], [
            'nama_kategori_ekskul.required' => 'Nama Kategori Ekskul harus diisi'
        ]);

        $data = [
            'nama_kategori_ekskul' => $request->input('nama_kategori_ekskul')
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
            $data_gambar = KategoriEkskul::where('id', $id)->first();
            File::delete(public_path('img/ekskul') . '/' . $data_gambar->gambar);

            // Upload file gambar baru
            $data = [
                'gambar' => $gambar_nama
            ];
        }

        KategoriEkskul::where('id', $id)->update($data);
        return redirect()->route('kategoriekskul.index')->with('success', 'Berhasil edit kategori ekskul');
    }

    public function destroy($id)
    {
        KategoriEkskul::where('id', $id)->delete();
        return redirect()->route('kategoriekskul.index')->with('success', 'Berhasil Hapus Kategori Ekskul');
    }
}
