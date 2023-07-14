<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\KomunitasPost;
use App\Models\Kontak;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'Beranda',
            'active' => '',
            'berita' => Berita::with('kategori', 'user')->orderBy('created_at', 'desc')->limit(6)->get(),
            'prestasi' => Prestasi::orderBy('created_at', 'desc')->limit(3)->get(),
            'ekstrakurikuler' => Ekstrakurikuler::all(),
            'banner' => Banner::first(),
            'komunitas' => KomunitasPost::with('komunitas')->orderBy('created_at', 'desc')->limit(3)->get()
        ]);
    }

    public function index_banner()
    {
        return view('dashboard.banner.index', [
            'title' => 'Banner Website SMP N 18 Medan',
            'active' => 'heroimage',
            'banner' => Banner::first()
        ]);
    }

    public function edit_img_hero($id)
    {
        return view('dashboard.profile.update_img_hero', [
            'title' => 'Update hero image',
            'active' => 'heroimage',
            'banner' => Banner::where('id', $id)->first()
        ]);
    }

    public function update_img_hero(Request $request, $id)
    {

        if ($request->hasFile('banner')) {
            $request->validate([
                'banner' => 'mimes:jpg,jpeg,png'
            ], [
                'banner.mimes' => 'Gambar harus berekstensi : jpg, jpeg, png'
            ]);

            // Upload Gambar
            $gambar_file = $request->file('banner');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
            $gambar_file->move(public_path('img/banner/'), $gambar_nama);
            //sudah terUpload ke direktori

            // hapus file lama
            $data_gambar = Banner::where('id', $id)->first();
            File::delete(public_path('img/banner') . '/' . $data_gambar->banner);

            // Upload file gambar baru
            $banner = [
                'banner' => $gambar_nama
            ];
            Banner::where('id', $id)->update($banner);
            return redirect()->route('index.banner')->with('success', 'Berhasil Ubah Gambar Banner Website');
        }

        // dd($banner);
        return redirect()->route('hero.image.edit', ['id' => $id])->with('success', 'Tidak ada gambar yang di update');
    }

    public function build()
    {
        return view('cunstruction', [
            'title' => 'Page Under Bulding',
            'active' => 'none',
        ]);
    }
}
