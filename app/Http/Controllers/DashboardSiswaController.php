<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardSiswaController extends Controller
{

    public function index(Request $request)
    {
        $siswa = Siswa::query();
        // filter by nama
        $siswa->when($request->nama_siswa, function ($query) use ($request) {
            return $query->where('nama_siswa', 'like', '%' . $request->nama_siswa . '%');
        });
        // filter by kelas
        $siswa->when($request->kelas, function ($query) use ($request) {
            return $query->where('id_kelas', $request->kelas);
        });
        return view('dashboard.siswa.index', [
            'title' => 'Data Siswa',
            'active' => 'siswa',
            'siswa' => $siswa->paginate(25),
            'kelas' => Kelas::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.siswa.create', [
            'title' => 'Tambah Siswa',
            'active' => 'siswa',
            'kelas' => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'id_kelas' => 'required'
        ], [
            'nama_siswa.required' => 'Nama Siswa harus diisi',
            'id_kelas.required' => 'Kelas harus diisi'
        ]);

        $siswa = [
            'nama_siswa' => $request->input('nama_siswa'),
            'id_kelas' => $request->input('id_kelas')
        ];

        Siswa::create($siswa);
        return redirect()->route('siswa.index')->with('success', 'Berhasil Menambahkan Data Siswa');
    }

    public function edit($id)
    {
        return view('dashboard.siswa.edit', [
            'title' => 'Edit Siswa',
            'active' => 'siswa',
            'siswa' => Siswa::with('kelas')->where('id', $id)->first(),
            'kelas' => Kelas::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'id_kelas' => 'required'
        ], [
            'nama_siswa.required' => 'Nama Siswa harus diisi',
            'id_kelas.required' => 'Kelas harus diisi'
        ]);

        $siswa = [
            'nama_siswa' => $request->input('nama_siswa'),
            'id_kelas' => $request->input('id_kelas')
        ];

        Siswa::where('id', $id)->update($siswa);
        return redirect()->route('siswa.index')->with('success', 'Berhasil Ubah Data Siswa');
    }

    public function destroy($id)
    {
        Siswa::where('id', $id)->delete();
        return redirect()->route('siswa.index')->with('success', 'Berhasil Hapus Data Siswa');
    }
}
