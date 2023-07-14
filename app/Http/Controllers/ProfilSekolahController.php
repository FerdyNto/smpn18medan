<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Kontak;
use App\Models\Sarpras;
use App\Models\SekapurSirih;
use App\Models\Siswa;
use App\Models\Staff;
use App\Models\User;
use App\Models\Visi_misi;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    public function visi_misi()
    {
        return view('profile.visi_misi', [
            'title' => 'Visi, Misi & Tujuan',
            'active' => 'profil',
            'visi_misi' => Visi_misi::first()
        ]);
    }

    public function sarpras()
    {
        return view('profile.sarpras', [
            'title' => 'Sarana & Prasarana',
            'active' => 'profil',
            'sarpras' => Sarpras::all()
        ]);
    }
    public function sarpras_detail($slug)
    {
        return view('profile.sarpras_detail', [
            'title' => 'Sarana & Prasarana',
            'active' => 'profil',
            'sarpras' => Sarpras::where('slug', $slug)->first()
        ]);
    }

    public function staff()
    {
        return view('profile.staff', [
            'title' => 'Staff',
            'active' => 'profil',
            'staff' => Staff::all()
        ]);
    }

    public function guru()
    {
        return view('profile.guru', [
            'title' => 'Guru',
            'active' => 'profil',
            'guru' => Guru::all()
        ]);
    }

    public function sekapursirih()
    {
        return view('profile.sekapursirih', [
            'title' => 'Sekapur Sirih',
            'active' => 'profil',
            'sekapursirih' => SekapurSirih::first(),
            'editor' => User::all()
        ]);
    }

    public function siswa(Request $request)
    {
        $siswa = Siswa::query();
        $siswa->when($request->cari, function ($query) use ($request) {
            return $query->where('nama_siswa', 'like', '%' . $request->cari . '%');
        });
        $siswa->when($request->kelas, function ($query) use ($request) {
            return $query->where('id_kelas', $request->kelas);
        });
        return view('profile.siswa', [
            'title' => 'Siswa',
            'active' => 'profil',
            'siswa' => $siswa->with('kelas')->orderBy('id_kelas', 'asc')->paginate(25),
            'kelas' => Kelas::all()
        ]);
    }
}
