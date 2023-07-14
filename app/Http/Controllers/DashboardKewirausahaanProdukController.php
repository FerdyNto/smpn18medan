<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kewirausahaan;
use Illuminate\Support\Facades\File;

class DashboardKewirausahaanProdukController extends Controller
{
    public function index_produk(Request $request)
    {
        $produk = Kewirausahaan::query();
        $produk->when($request->produk, function ($query) use ($request) {
            return $query->where('nama', 'like', '%' . $request->produk . '%');
        });
        return view(
            'dashboard.kewirausahaan.produk.index',
            [
                'title' => 'Produk Kewirausahaan',
                'active' => 'produk',
                'usaha' => $produk->where('kategori', 'Produk')->paginate(10)
            ]
        );
    }

    public function create_produk()
    {
        return view('dashboard.kewirausahaan.produk.create', [
            'title' => 'Tambah Produk Kewirausahaan',
            'active' => 'produk'
        ]);
    }

    public function store_produk(Request $request)
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
        $gambar_file->move(public_path('img/produk/'), $gambar_nama);

        $produk = [
            'nama' => $request->input('nama'),
            'slug' => $request->input('slug'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $gambar_nama,
            'kontak' => $request->input('kontak'),
            'pesan' => $request->input('pesan'),
            'harga' => $request->input('harga'),
            'kategori' => $request->input('kategori')
        ];

        Kewirausahaan::create($produk);
        return redirect()->route('produk.index')->with('success', 'Berhasil menambahkan produk baru');
    }

    public function edit_produk($slug)
    {
        return view('dashboard.kewirausahaan.produk.edit', [
            'title' => 'Edit Produk Kewirausahaan',
            'active' => 'produk',
            'usaha' => Kewirausahaan::where('slug', $slug)->first()
        ]);
    }

    public function update_produk(Request $request, $slug)
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

        $produk = [
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
            $produk = [
                'gambar' => $gambar_nama
            ];
        }
        Kewirausahaan::where('slug', $slug)->update($produk);
        return redirect()->route('produk.index')->with('success', 'Berhasil update produk');
    }

    public function destroy_produk($slug)
    {
        //delete image
        $produk = Kewirausahaan::where('slug', $slug)->first();
        File::delete(public_path('img/produk') . '/' . $produk->gambar);

        // Hapus Berita dari database
        Kewirausahaan::where('slug', $slug)->delete();
        return redirect()->route('produk.index')->with('success', 'Berhasil Hapus Produk');
    }
}
