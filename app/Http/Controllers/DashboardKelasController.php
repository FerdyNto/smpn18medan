<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class DashboardKelasController extends Controller
{
    public function index()
    {
        return view('dashboard.kelas.index', [
            'title' => 'Data Kelas',
            'active' => 'kelas',
            'kelas' => Kelas::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.kelas.create', [
            'title' => 'Tambah Kelas',
            'active' => 'kelas'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas'
        ], [
            'nama_kelas.required' => 'Nama Kelas harus diisi',
            'nama_kelas.unique' => 'Nama Kelas sudah tersedia'
        ]);

        $kelas = [
            'nama_kelas' => $request->input('nama_kelas')
        ];

        Kelas::create($kelas);
        return redirect()->route('kelas.index')->with('success', 'Berhasil menambahkan kelas baru');
    }

    public function edit($id)
    {
        return view('dashboard.kelas.edit', [
            'title' => 'Edit Kelas',
            'active' => 'kelas',
            'kelas' => Kelas::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas'
        ], [
            'nama_kelas.required' => 'Nama Kelas harus diisi',
            'nama_kelas.unique' => 'Nama Kelas sudah tersedia'
        ]);

        $kelas = [
            'nama_kelas' => $request->input('nama_kelas')
        ];

        Kelas::where('id', $id)->update($kelas);
        return redirect()->route('kelas.index')->with('success', 'Berhasil Ubah Nama Kelas');
    }

    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();
        return redirect()->route('kelas.index')->with('success', 'Berhasil Hapus Kelas');
    }
}
