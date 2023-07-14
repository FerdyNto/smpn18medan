<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SessionController extends Controller
{
    public function index()
    {
        return view('sesi.index', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function login(Request $request)
    {
        $login =  $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi'
        ]);
        // Otentikasi
        if (Auth::attempt($login)) {
            // otentikasi suskses
            // return 'Berhasil';
            return redirect(route('dashboard.index'))->with('success', 'Selamat datang ' . Auth::user()->nama_user);
        } else {
            // otentikasi gagal
            // return 'Gagal';
            return redirect(route('login'))->withErrors('Username dan Password tidak valid');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'Sampai bertemu lagi :)');
    }

    function register()
    {
        return view('sesi.register', [
            'title' => 'Register',
            'active' => 'user'
        ]);
    }

    function create(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:8|max:16',
            'confirm-password' => 'required|min:8|max:16|same:password',
            'nama_user' => 'required',
            'lvl' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png'
        ], [
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'nama_user.required' => 'Nama Harus Diisi',
            'username.unique' => 'Username Sudah Digunakan',
            'password.min' => 'Password Minimal 8 Karakter',
            'password.max' => 'Password Maksimal 16 Karakter',
            'confirm-password.required' => 'Konfirmasi Password harus diisi',
            'confirm-password.same' => 'Password tidak sesuai',
            'lvl.required' => 'level diperlukan',
            'gambar.mimes' => 'gambar harus berekstensi jpg, jpeg, png'
        ]);

        if ($request->gambar) {
            // Upload Gambar
            $gambar_file = $request->file('gambar');
            $gambar_ekstensi = $gambar_file->extension();
            $gambar_nama = date('ymdhis') . '.' . $gambar_ekstensi;
            $gambar_file->move(public_path('img/user/'), $gambar_nama);
        } else {
            $gambar_nama = '';
        }

        $register = [
            'nama_user' => $request->nama_user,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'lvl' => $request->lvl,
            'gambar' => $gambar_nama
        ];

        User::create($register);
        return redirect(route('user.index'))->with('success', 'Berhasil register');
    }

    function ubah_password()
    {
        return view('sesi.ubahPassword', [
            'title' => 'Ubah Password',
            'active' => 'profil-user'
        ]);
    }

    function ubah_password_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|min:8|max:16',
            'confirm_password' => 'required|same:new_password',
        ], [
            'old_password.required' => 'Password lama harus diisi',
            'old_password.current_password' => 'Password lama tidak sesuai',
            'new_password.required' => 'Password baru harus diisi',
            'new_password.min' => 'Minimal password 8 karakter',
            'new_password.max' => 'Maksimal password 16 karakter',
            'confirm_password.required' => 'Konfirmasi password harus diisi',
            'confirm_password.same' => 'Konfirmasi password harus sesuai dengan password baru'
        ]);

        $user = User::find(Auth::id());
        $user->password = bcrypt($request->new_password);
        $user->save();
        $request->session()->regenerate();

        return redirect(route('ubah.password'))->with('success', 'Berhasil Ubah Password');
    }

    public function profil($username)
    {
        return view('dashboard.users.profil', [
            'title' => 'Profil',
            'active' => 'profil-user',
            'user' => User::where('username', $username)->first()
        ]);
    }

    public function profil_update(Request $request, $username)
    {
        $request->validate([
            'nama_user' => 'required',
            'username' => 'required'
        ], [
            'nama_user.required' => 'Nama harus diisi',
            'username.required' => 'username harus diisi'
        ]);

        $user = [
            'nama_user' => $request->input('nama_user'),
            'username' => $request->input('username')
        ];

        User::where('username', $username)->update($user);
        return redirect()->route('user.profil', ['username' => $username])->with('success', 'Berhasil update profil');
    }

    public function edit_foto_profil($username)
    {
        return view('dashboard.users.edit_profil', [
            'title' => 'Update hero image',
            'active' => 'heroimage',
            'user' => User::where('username', $username)->first()
        ]);
    }

    public function update_foto_profil(Request $request, $username)
    {

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
            $gambar_file->move(public_path('img/user/'), $gambar_nama);
            //sudah terUpload ke direktori

            // hapus file lama
            $data_gambar = User::where('username', $username)->first();
            File::delete(public_path('img/user') . '/' . $data_gambar->gambar);

            // Upload file gambar baru
            $foto = [
                'gambar' => $gambar_nama
            ];
            User::where('username', $username)->update($foto);
            return redirect()->route('user.profil', ['username' => $username])->with('success', 'Berhasil Ubah Foto Profil');
        }

        // dd($banner);
        return redirect()->route('user.profil', ['username' => $username])->with('success', 'Tidak ada foto yang di update');
    }
}
