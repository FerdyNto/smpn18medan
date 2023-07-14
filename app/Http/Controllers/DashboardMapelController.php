<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class DashboardMapelController extends Controller
{
    public function index()
    {
        return view('dashboard.mapel.index', [
            'title' => 'Data Mata Pelajaran',
            'active' => 'mapel',
            'mapel' => Mapel::orderBy('nama_mapel', 'asc')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.mapel.create', [
            'title' => 'Form Tambah Mata Pelajaran',
            'active' => 'mapel'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required'
        ], [
            'nama_mapel.required' => 'Nama Mata Pelajaran harus diisi'
        ]);

        $mapel = [
            'nama_mapel' => $request->input('nama_mapel')
        ];

        Mapel::create($mapel);
        return redirect()->route('mapel.index')->with('success', 'Berhasil Menambahkan Mata Pelajaran Baru');
    }

    public function edit($id)
    {
        return view('dashboard.mapel.edit', [
            'title' => 'Form Edit Mata Pelajaran',
            'active' => 'mapel',
            'mapel' => Mapel::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mapel' => 'required'
        ], [
            'nama_mapel.required' => 'Nama Mata Pelajaran harus diisi'
        ]);

        $mapel = [
            'nama_mapel' => $request->input('nama_mapel')
        ];

        Mapel::where('id', $id)->update($mapel);
        return redirect()->route('mapel.index')->with('success', 'Berhasil Ubah Mata Pelajaran');
    }

    public function destroy($id)
    {
        Mapel::where('id', $id)->delete();
        return redirect()->route('mapel.index')->with('success', 'Berhasil Hapus Mata Pelajaran');
    }
}
