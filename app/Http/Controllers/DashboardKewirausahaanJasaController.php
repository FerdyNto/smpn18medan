<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewirausahaan;
use Illuminate\Support\Facades\File;

class DashboardKewirausahaanJasaController extends Controller
{
    public function index_jasa(Request $request)
    {

        $jasa = Kewirausahaan::query();
        $jasa->when($request->jasa, function ($query) use ($request) {
            return $query->where('nama', 'like', '%' . $request->jasa . '%');
        });
        return view('dashboard.kewirausahaan.jasa.index', [
            'title' => 'Jasa Kewirausahaan',
            'active' => 'jasa',
            'usaha' => $jasa->where('kategori', 'Jasa')->paginate(10)
        ]);
    }

    public function create_jasa()
    {
        return view('dashboard.kewirausahaan.jasa.create', [
            'title' => 'Tambah Jasa Kewirausahaan',
            'active' => 'jasa'
        ]);
    }

    public function store_jasa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'slug' => 'required|unique:kewirausahaans',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'kontak' => 'required|max:13',
            'pesan' => 'required',
            'harga' => 'required',
            'kategori' => 'required'
        ], [
            'nama.required' => 'Nama produk harus diisi',
            'slug.required' => 'slug harus diisi',
            'slug.unique' => 'slug sudah digunakan',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'gambar.required' => 'Gambar harus diisi',
            'gambar.mimes' => 'Gambar harus berekstensi jpg, png, jpeg',
            'kontak.required' => 'Kontak harus diisi',
            'kontak.max' => 'Nomor HP (WA) maksimal 13 angka',
            'pesan.required' => 'Pesan harus diisi',
            'harga.required' => 'Harga harus diisi',
            'kategori.required' => 'Kategori harus diisi'
        ]);

        // Upload Gambar
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('img/jasa/'), $gambar_nama);

        $jasa = [
            'nama' => $request->input('nama'),
            'slug' => $request->input('slug'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $gambar_nama,
            'kontak' => $request->input('kontak'),
            'pesan' => $request->input('pesan'),
            'harga' => $request->input('harga'),
            'kategori' => $request->input('kategori')
        ];

        Kewirausahaan::create($jasa);
        return redirect()->route('jasa.index')->with('success', 'Berhasil menambahkan jasa baru');
    }

    public function edit_jasa($slug)
    {
        return view('dashboard.kewirausahaan.jasa.edit', [
            'title' => 'Edit Jasa Kewirausahaan',
            'active' => 'jasa',
            'usaha' => Kewirausahaan::where('slug', $slug)->first()
        ]);
    }

    public function update_jasa(Request $request, $slug)
    {
        $request->validate([
            'nama' => 'required',
            'slug' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required|max:13',
            'pesan' => 'required',
            'harga' => 'required',
            'kategori' => 'required'
        ], [
            'nama.required' => 'Nama produk harus diisi',
            'slug.required' => 'slug harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'kontak.required' => 'Kontak harus diisi',
            'kontak.max' => 'Nomor HP (WA) maksimal 13 angka',
            'pesan.required' => 'Pesan harus diisi',
            'harga.required' => 'Harga harus diisi',
            'kategori.required' => 'Kategori harus diisi'
        ]);

        $jasa = [
            'nama' => $request->input('nama'),
            'slug' => $request->input('slug'),
            'deskripsi' => $request->input('deskripsi'),
            'kontak' => $request->input('kontak'),
            'pesan' => $request->input('pesan'),
            'harga' => $request->input('harga'),
            'kategori' => $request->input('kategori')
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
            $gambar_file->move(public_path('img/produk/'), $gambar_nama);
            //sudah terUpload ke direktori

            // hapus file lama
            $data_gambar = Kewirausahaan::where('slug', $slug)->first();
            File::delete(public_path('img/produk') . '/' . $data_gambar->gambar);

            // Upload file gambar baru
            $jasa = [
                'gambar' => $gambar_nama
            ];
        }
        Kewirausahaan::where('slug', $slug)->update($jasa);
        return redirect()->route('jasa.index')->with('success', 'Berhasil update jasa');
    }

    public function destroy_jasa($slug)
    {
        //delete image
        $jasa = Kewirausahaan::where('slug', $slug)->first();
        File::delete(public_path('img/jasa') . '/' . $jasa->gambar);

        // Hapus Berita dari database
        Kewirausahaan::where('slug', $slug)->delete();
        return redirect()->route('jasa.index')->with('success', 'Berhasil Hapus Jasa');
    }
}
