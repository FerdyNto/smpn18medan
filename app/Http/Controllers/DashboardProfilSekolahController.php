<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Sarpras;
use App\Models\SekapurSirih;
use App\Models\Staff;
use App\Models\Visi_misi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardProfilSekolahController extends Controller
{
    public function visi_misi()
    {
        return view('dashboard.profile.visi_misi', [
            'title' => 'Visi & Misi',
            'active' => 'visi-misi',
            'visi_misi' => Visi_misi::first(),

        ]);
    }

    public function visi_misi_update(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required'
        ], [
            'visi.required' => 'Sekolah harus punya Visi',
            'misi.required' => 'sekolah harus punya Misi',
            'tujuan.required' => 'sekolah harus punya Tujuan'
        ]);

        $data = [
            'visi' => $request->input('visi'),
            'misi' => $request->input('misi'),
            'tujuan' => $request->input('tujuan')
        ];
        Visi_misi::where('id', $id)->update($data);
        return redirect()->route('profile.visi-misi')->with('success', 'Berhasil Update Visi & Misi');
    }

    public function sarpras()
    {
        return view('dashboard.profile.sarpras.sarpras', [
            'title' => 'Sarpras',
            'active' => 'sarpras',
            'sarpras' => Sarpras::paginate(5),
        ]);
    }

    public function sarpras_create()
    {
        return view('dashboard.profile.sarpras.create_sarpras', [
            'title' => 'Sarpras',
            'active' => 'sarpras',

        ]);
    }

    public function sarpras_store(Request $request)
    {
        $request->validate([
            'nama_sarpras' => 'required',
            'slug' => 'required|unique:sarpras',
            'deskripsi' => 'required',
            'jenis' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png'
        ], [
            'nama_sarpras.required' => 'Nama Sarpras harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'jenis.required' => 'Pilih jenis terlebih dahulu',
            'gambar.required' => 'Pilih gambar terlebih dahulu',
            'gambar.mimes' => 'Gambar harus berekstensi : jpg, jpeg, png'
        ]);

        // Upload Gambar
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('img/sarpras/'), $gambar_nama);

        $sarpras = [
            'nama_sarpras' => $request->input('nama_sarpras'),
            'slug' => $request->input('slug'),
            'deskripsi' => $request->input('deskripsi'),
            'jenis' => $request->input('jenis'),
            'gambar' => $gambar_nama
        ];

        Sarpras::create($sarpras);
        return redirect()->route('profile.sarpras')->with('success', 'Berhasil Menambahkan Sarpras Baru');
    }

    public function sarpras_edit($slug)
    {
        return view('dashboard.profile.sarpras.edit_sarpras', [
            'title' => 'Sarpras',
            'active' => 'sarpras',
            'sarpras' => Sarpras::where('slug', $slug)->first()
        ]);
    }

    public function sarpras_update(Request $request, $id)
    {
        $request->validate([
            'nama_sarpras' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required'
        ], [
            'nama_sarpras.required' => 'Nama Sarpras harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'jenis.required' => 'Pilih jenis terlebih dahulu'
        ]);

        $sarpras = [
            'nama_sarpras' => $request->input('nama_sarpras'),
            'deskripsi' => $request->input('deskripsi'),
            'jenis' => $request->input('jenis')
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
            $gambar_file->move(public_path('img/sarpras/'), $gambar_nama);



            // hapus file lama
            $data_gambar = Sarpras::where('slug', $id)->first();
            File::delete(public_path('img/sarpras') . '/' . $data_gambar->gambar);

            // Upload file gambar baru
            $sarpras = [
                'gambar' => $gambar_nama
            ];
        }


        Sarpras::where('slug', $id)->update($sarpras);
        return redirect()->route('profile.sarpras')->with('success', 'Berhasil Ubah Sarpras');
    }

    public function sarpras_destroy($id)
    {
        //delete image
        $sarpras = Sarpras::where('slug', $id)->first();
        File::delete(public_path('img/sarpras') . '/' . $sarpras->gambar);

        // Hapus Sarpras dari database
        Sarpras::where('slug', $id)->delete();
        return redirect()->route('profile.sarpras')->with('success', 'Berhasil Hapus Sarpras');
    }

    public function guru()
    {
        return view('dashboard.strukturOrganisasi.guru.index', [
            'title' => 'Data Guru',
            'active' => 'guru',
            'guru' => Guru::paginate(10),

        ]);
    }

    public function guru_create()
    {
        return view('dashboard.strukturOrganisasi.guru.create', [
            'title' => 'Tambah Data Guru Baru',
            'active' => 'guru',

        ]);
    }

    public function guru_store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            // 'tgl_lahir' => 'required',
            'mapel' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png'
        ], [
            'nama.required' => 'Nama Harus Diisi',
            // 'tgl_lahir.required' => 'Tanggal Lahir harus diisi',
            'mapel.required' => 'Mapel Harus Diisi',
            'foto.required' => 'Pilih Foto Terlebih Dahulu',
            'foto.mimes' => 'Foto Harus Berekstensi : jpg, jpeg, png'
        ]);

        // Upload Gambar
        $gambar_file = $request->file('foto');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('img/guru/'), $gambar_nama);


        $guru = [
            'nama' => $request->input('nama'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'mapel' => $request->input('mapel'),
            'foto' => $gambar_nama
        ];

        Guru::create($guru);
        return redirect()->route('profile.guru')->with('success', 'Berhasil Menambahkan Guru Baru');
    }

    public function guru_edit($id)
    {
        return view('dashboard.strukturOrganisasi.guru.edit', [
            'title' => 'Edit Data Guru',
            'active' => 'guru',
            'guru' => Guru::where('id', $id)->first(),

        ]);
    }

    public function guru_update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'mapel' => 'required',
            // 'tgl_lahir' => 'required',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            // 'mapel.required' => 'Mapel Harus Diisi',
            'tgl_lahir.required' => 'Tanggal Lahir harus diisi',
        ]);

        $guru = [
            'nama' => $request->input('nama'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'mapel' => $request->input('mapel')
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpg,jpeg,png'
            ], [
                'foto.mimes' => 'Foto harus berekstensi : jpg, jpeg, png'
            ]);

            // Upload Gambar
            $gambar_file = $request->file('foto');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
            $gambar_file->move(public_path('img/guru/'), $gambar_nama);
            //sudah terUpload ke direktori

            // hapus file lama
            $data_gambar = Guru::where('id', $id)->first();
            File::delete(public_path('img/guru') . '/' . $data_gambar->foto);

            // Upload file gambar baru
            $guru = [
                'foto' => $gambar_nama
            ];
        }

        Guru::where('id', $id)->update($guru);
        return redirect()->route('profile.guru')->with('success', 'Berhasil Edit Data Guru');
    }

    public function guru_destroy($id)
    {
        //delete image
        $guru = Guru::where('id', $id)->first();
        File::delete(public_path('img/guru') . '/' . $guru->foto);

        // Hapus Berita dari database
        Guru::where('id', $id)->delete();
        return redirect()->route('profile.guru')->with('success', 'Berhasil Hapus Data Guru');
    }

    public function staff()
    {
        return view('dashboard.strukturOrganisasi.staff.index', [
            'title' => 'Data Staff',
            'active' => 'staff',
            'staff' => Staff::paginate(10),

        ]);
    }

    public function staff_create()
    {
        return view('dashboard.strukturOrganisasi.staff.create', [
            'title' => 'Tambah Data Staff Baru',
            'active' => 'staff',

        ]);
    }

    public function staff_store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png'
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'jabatan.required' => 'Jabatan Harus Diisi',
            'foto.required' => 'Pilih Foto Terlebih Dahulu',
            'foto.mimes' => 'Foto Harus Berekstensi : jpg, jpeg, png'
        ]);

        // Upload Gambar
        $gambar_file = $request->file('foto');
        $gambar_ekstensi = $gambar_file->extension();
        $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('img/staff/'), $gambar_nama);

        $staff = [
            'nama' => $request->input('nama'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jabatan' => $request->input('jabatan'),
            'foto' => $gambar_nama
        ];

        Staff::create($staff);
        return redirect()->route('profile.staff')->with('success', 'Berhasil Menambahkan Staff Baru');
    }

    public function staff_edit($id)
    {
        return view('dashboard.strukturOrganisasi.staff.edit', [
            'title' => 'Edit Data Staff',
            'active' => 'staff',
            'staff' => Staff::where('id', $id)->first(),

        ]);
    }

    public function staff_update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'jabatan.required' => 'Jabatan Harus Diisi',
        ]);

        $staff = [
            'nama' => $request->input('nama'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jabatan' => $request->input('jabatan')
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpg,jpeg,png'
            ], [
                'foto.mimes' => 'Foto harus berekstensi : jpg, jpeg, png'
            ]);

            // Upload Gambar
            $gambar_file = $request->file('foto');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
            $gambar_file->move(public_path('img/staff/'), $gambar_nama);
            //sudah terUpload ke direktori

            // hapus file lama
            $data_gambar = Staff::where('id', $id)->first();
            File::delete(public_path('img/staff') . '/' . $data_gambar->foto);

            // Upload file gambar baru
            $staff = [
                'foto' => $gambar_nama
            ];
        }

        Staff::where('id', $id)->update($staff);
        return redirect()->route('profile.staff')->with('success', 'Berhasil Edit Data Staff');
    }

    public function staff_destroy($id)
    {
        //delete image
        $staff = Staff::where('id', $id)->first();
        File::delete(public_path('img/staff') . '/' . $staff->foto);

        // Hapus Berita dari database
        Staff::where('id', $id)->delete();
        return redirect()->route('profile.staff')->with('success', 'Berhasil Hapus Data Staff');
    }

    public function sekapur_sirih()
    {
        return view('dashboard.profile.sekapursirih', [
            'title' => 'Sekapur Sirih',
            'active' => 'sekapursirih',
            'sekapursirih' => SekapurSirih::first()
        ]);
    }

    public function sekapur_sirih_update(Request $request, $id)
    {
        $request->validate([
            'sekapursirih' => 'required',
            'nama_kepsek' => 'required'
        ], [
            'sekapursirih.required' => 'Sekapur Sirih harus diisi',
            'nama_kepsek.required' => 'Nama Kepala Sekolah harus diisi'
        ]);

        $sekapursirih = [
            'sekapursirih' => $request->input('sekapursirih'),
            'nama_kepsek' => $request->input('nama_kepsek')
        ];

        if ($request->hasFile('gambar_kepsek')) {
            $request->validate([
                'gambar_kepsek' => 'mimes:jpg,jpeg,png'
            ], [
                'gambar_kepsek.mimes' => 'Gambar harus berekstensi : jpg, jpeg, png'
            ]);


            // Upload Gambar
            $gambar_file = $request->file('gambar_kepsek');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
            $gambar_file->move(public_path('img/kepsek/'), $gambar_nama);

            // hapus file lama
            $data_gambar = SekapurSirih::where('id', $id)->first();
            File::delete(public_path('img/kepsek') . '/' . $data_gambar->gambar_kepsek);

            // Upload file gambar baru
            $sekapursirih = [
                'gambar_kepsek' => $gambar_nama
            ];
        }
        SekapurSirih::where('id', $id)->update($sekapursirih);
        return redirect()->route('profile.sekapursirih')->with('success', 'Berhasil Ubah Sekapur Sirih');
    }
}
