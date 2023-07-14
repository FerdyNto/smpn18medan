<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class DashboardKontakController extends Controller
{
    public function index()
    {
        return view('dashboard.kontak.index', [
            'title' => 'Kontak',
            'active' => 'kontak',
            'kontak' => Kontak::first()
        ]);
    }

    public function edit($id)
    {
        return view('dashboard.kontak.edit', [
            'title' => 'Edit Kontak',
            'active' => 'kontak',
            'kontak' => Kontak::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'alamat' => 'required',
            'telp' => 'required'
        ], [
            'email.required' => 'email harus diisi',
            'email.email' => 'email tidak sesuai, coba cek kembali',
            'alamat.required' => 'alamat harus diisi',
            'telp.required' => 'nomor telepon harus diisi'
        ]);

        $kontak = [
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'telp' => $request->input('telp')
        ];

        Kontak::where('id', $id)->update($kontak);
        return redirect()->route('kontak.index')->with('success', 'Berhasil Update Kontak');
    }
}
