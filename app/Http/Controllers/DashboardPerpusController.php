<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Perpus;
use Illuminate\Http\Request;

class DashboardPerpusController extends Controller
{
    public function index(Request $request)
    {
        $perpus = Perpus::query();
        $perpus->when($request->cari, function ($query) use ($request) {
            return $query->where('nama_buku', 'like', '%' . $request->cari . '%');
        });
        return view('dashboard.perpus.index', [
            'title' => 'Data Perpustakaan (Modul)',
            'active' => 'perpus',
            'perpus' => $perpus->with('kelas', 'mapel')->orderBy('id_mapel', 'asc')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.perpus.create', [
            'title' => 'Form Tambah Perpustakaan (Modul)',
            'active' => 'perpus',
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_buku' => 'required',
            'mapel' => 'required',
            'kelas' => 'required',
            'link' => 'required'
        ], [
            'nama_buku.required' => 'Nama buku harus diisi',
            'mapel.required' => 'Nama mata pelajaran harus dipilih',
            'kelas.required' => 'Nama kelas harus dipilih',
            'link.required' => 'Link harus diisi'
        ]);

        $perpus = [
            'nama_buku' => $request->input('nama_buku'),
            'id_mapel' => $request->input('mapel'),
            'id_kelas' => $request->input('kelas'),
            'link' => $request->input('link')
        ];

        Perpus::create($perpus);
        return redirect()->route('perpus.index')->with('success', 'Berhasil menambahkan buku / modul baru');
    }

    public function edit($id)
    {
        return view('dashboard.perpus.edit', [
            'title' => 'Form Edit Perpustakaan (Modul)',
            'active' => 'perpus',
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all(),
            'perpus' => Perpus::with('kelas', 'mapel')->where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_buku' => 'required',
            'mapel' => 'required',
            'kelas' => 'required',
            'link' => 'required'
        ], [
            'nama_buku.required' => 'Nama buku harus diisi',
            'mapel.required' => 'Nama mata pelajaran harus dipilih',
            'kelas.required' => 'Nama kelas harus dipilih',
            'link.required' => 'Link harus diisi'
        ]);

        $perpus = [
            'nama_buku' => $request->input('nama_buku'),
            'id_mapel' => $request->input('mapel'),
            'id_kelas' => $request->input('kelas'),
            'link' => $request->input('link')
        ];

        Perpus::where('id', $id)->update($perpus);
        return redirect()->route('perpus.index')->with('success', 'Berhasil ubah buku / modul');
    }

    public function destroy($id)
    {
        Perpus::where('id', $id)->delete();
        return redirect()->route('perpus.index')->with('success', 'Berhasil hapus buku / modul');
    }
}
