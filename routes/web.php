<?php

use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\DashboardBeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PrestasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardEkstrakurikulerController;
use App\Http\Controllers\DashboardInfoController;
use App\Http\Controllers\DashboardKategoriEkskulController;
use App\Http\Controllers\DashboardKelasController;
use App\Http\Controllers\DashboardKewirausahaanJasaController;
use App\Http\Controllers\DashboardKewirausahaanProdukController;
use App\Http\Controllers\DashboardKomunitasController;
use App\Http\Controllers\DashboardKontakController;
use App\Http\Controllers\DashboardMapelController;
use App\Http\Controllers\DashboardPerpusController;
use App\Http\Controllers\DashboardProfilSekolahController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboarPrestasiController;
use App\Http\Controllers\KewirausahaanController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/webunderbuilding', [HomeController::class, 'build']);
Route::get('/', [HomeController::class, 'index']);
// Berita
Route::get('/berita', [PostsController::class, 'index'])->name('berita');
Route::get('/berita/cari', [PostsController::class, 'cari_berita'])->name('cari.berita');
Route::get('/berita/{slug}', [PostsController::class, 'showBerita'])->name('berita.detail');
// Info
Route::get('/info', [PostsController::class, 'info'])->name('info');
Route::get('/info/cari', [PostsController::class, 'cari_info'])->name('cari.info');
Route::get('/info/{slug}', [PostsController::class, 'showInfo'])->name('info.detail');
// Prestasi
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
Route::get('/prestasi/{slug}', [PrestasiController::class, 'show'])->name('prestasi.detail');
// Profil
Route::get('/visi_misi', [ProfilSekolahController::class, 'visi_misi'])->name('visi-misi');
Route::get('/sarpras', [ProfilSekolahController::class, 'sarpras'])->name('sarpras');
Route::get('/sarpras/{slug}', [ProfilSekolahController::class, 'sarpras_detail'])->name('sarpras.detail');
Route::get('/staff', [ProfilSekolahController::class, 'staff'])->name('staff');
Route::get('/guru', [ProfilSekolahController::class, 'guru'])->name('guru');
Route::get('/sekapursirih', [ProfilSekolahController::class, 'sekapursirih'])->name('sekapursirih');
Route::get('/siswa', [ProfilSekolahController::class, 'siswa'])->name('siswa');
Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('perpustakaan');

// Kewirausahaan
Route::get('/kewirausahaan', [KewirausahaanController::class, 'index'])->name('kewirausahaan');

// Ekstrakurikuler
Route::get('/ekstrakurikuler', [KomunitasController::class, 'ekstrakurikuler'])->name('ekstrakurikuler.index');
Route::get('/ekstrakurikuler/{id}', [KomunitasController::class, 'ekskul_detail'])->name('ekstrakurikuler.detail');
Route::get('/ekstrakurikuler/{id}/show', [KomunitasController::class, 'ekskul_show'])->name('ekstrakurikuler.show');

// Komunitas Guru
Route::get('/komunitas', [KomunitasController::class, 'komunitas'])->name('komunitas');
Route::get('/komunitas/{slug}', [KomunitasController::class, 'komunitas_post_detail'])->name('komunitas.post');
Route::get('/komunitas/{id}/detail', [KomunitasController::class, 'komunitas_detail'])->name('komunitas.detail');



// Login
Route::get('/login', [SessionController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'login'])->name('login.proses')->middleware('guest');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

// Hanya akses ketika sudah login
Route::middleware(['middleware' => 'auth'])->group(function () {
    // Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        // Route Pengguna(User)
        Route::prefix('user')->group(function () {
            Route::get('/', [DashboardUserController::class, 'index'])->name('user.index');
            // Register
            Route::get('/register', [SessionController::class, 'register'])->name('register');
            Route::post('/create', [SessionController::class, 'create'])->name('register.proses');
            Route::get('/ubah_password', [SessionController::class, 'ubah_password'])->name('ubah.password');
            Route::put('/ubah_password_update', [SessionController::class, 'ubah_password_update'])->name('ubah.password.proses');
            Route::get('/{username}/profil', [SessionController::class, 'profil'])->name('user.profil');
            Route::put('/{username}/profil', [SessionController::class, 'profil_update'])->name('user.profil.update');
            Route::get('/{username}/foto', [SessionController::class, 'edit_foto_profil'])->name('foto.profil.edit');
            Route::put('/{username}/foto', [SessionController::class, 'update_foto_profil'])->name('foto.profil.update');
        });
        // Route Berita Dashboard
        Route::prefix('berita')->group(function () {
            Route::get('/', [DashboardBeritaController::class, 'index_berita'])->name('berita.index');
            // Route::get('/cari', [DashboardController::class, 'cari_berita'])->name('berita.cari');
            Route::get('/create', [DashboardBeritaController::class, 'create_berita'])->name('berita.create');
            Route::post('/store', [DashboardBeritaController::class, 'store_berita'])->name('berita.store');
            Route::get('/{slug}', [DashboardBeritaController::class, 'show_berita'])->name('berita.show');
            Route::get('/{slug}/edit', [DashboardBeritaController::class, 'edit_berita'])->name('berita.edit');
            Route::put('/{slug}', [DashboardBeritaController::class, 'update_berita'])->name('berita.update');
            Route::get('/delete/{slug}', [DashboardBeritaController::class, 'destroy_berita'])->name('berita.delete');
            Route::post('/image_upload', [CkeditorController::class, 'upload_gambar_berita'])->name('upload.gambar.berita');
        });
        Route::prefix('info')->group(function () {
            Route::get('/', [DashboardInfoController::class, 'index_info'])->name('info.index');
            Route::get('/cari', [DashboardInfoController::class, 'cari_info'])->name('info.cari');
            Route::get('/create', [DashboardInfoController::class, 'create_info'])->name('info.create');
            Route::post('/store', [DashboardInfoController::class, 'store_info'])->name('info.store');
            Route::get('/{slug}', [DashboardInfoController::class, 'show_info'])->name('info.show');
            Route::get('/{slug}/edit', [DashboardInfoController::class, 'edit_info'])->name('info.edit');
            Route::put('/{slug}', [DashboardInfoController::class, 'update_info'])->name('info.update');
            Route::get('/delete/{slug}', [DashboardInfoController::class, 'destroy_info'])->name('info.delete');
            Route::post('/image_upload', [CkeditorController::class, 'upload_gambar_berita'])->name('upload.gambar.info');
        });
        // Route Prestasi Dashbiard
        Route::prefix('prestasi')->group(function () {
            Route::get('/', [DashboarPrestasiController::class, 'index'])->name('prestasi.index');
            Route::get('/cari', [DashboarPrestasiController::class, 'cari'])->name('prestasi.cari');
            Route::get('/create', [DashboarPrestasiController::class, 'create'])->name('prestasi.create');
            Route::post('/store', [DashboarPrestasiController::class, 'store'])->name('prestasi.store');
            Route::get('/{slug}', [DashboarPrestasiController::class, 'show'])->name('prestasi.show');
            Route::get('/{slug}/edit', [DashboarPrestasiController::class, 'edit'])->name('prestasi.edit');
            Route::put('/{slug}', [DashboarPrestasiController::class, 'update'])->name('prestasi.update');
            Route::get('/delete/{slug}', [DashboarPrestasiController::class, 'destroy'])->name('prestasi.delete');
            Route::post('/image_upload', [CkeditorController::class, 'upload_gambar_prestasi'])->name('upload.gambar.prestasi');
        });
        // Ekstrakurikuler
        Route::prefix('ekskul')->group(function () {
            Route::get('/', [DashboardEkstrakurikulerController::class, 'index'])->name('ekskul.index');
            Route::get('/create', [DashboardEkstrakurikulerController::class, 'create'])->name('ekskul.create');
            Route::post('/store', [DashboardEkstrakurikulerController::class, 'store'])->name('ekskul.store');
            Route::get('/{id}/edit', [DashboardEkstrakurikulerController::class, 'edit'])->name('ekskul.edit');
            Route::put('/{id}', [DashboardEkstrakurikulerController::class, 'update'])->name('ekskul.update');
            Route::get('/delete/{id}', [DashboardEkstrakurikulerController::class, 'destroy'])->name('ekskul.delete');
        });
        // Kategori Ekskul
        Route::prefix('kategori-ekskul')->group(function () {
            Route::get('/', [DashboardKategoriEkskulController::class, 'index'])->name('kategoriekskul.index');
            Route::get('/create', [DashboardKategoriEkskulController::class, 'create'])->name('kategoriekskul.create');
            Route::post('/store', [DashboardKategoriEkskulController::class, 'store'])->name('kategoriekskul.store');
            Route::get('/{id}/edit', [DashboardKategoriEkskulController::class, 'edit'])->name('kategoriekskul.edit');
            Route::put('/{id}', [DashboardKategoriEkskulController::class, 'update'])->name('kategoriekskul.update');
            Route::get('/delete/{id}', [DashboardKategoriEkskulController::class, 'destroy'])->name('kategoriekskul.delete');
        });
        // Komunitas Guru
        Route::prefix('komunitas')->group(function () {
            Route::get('/', [DashboardKomunitasController::class, 'index'])->name('komunitas.index');
            Route::get('/create', [DashboardKomunitasController::class, 'create'])->name('komunitas.create');
            Route::post('/store', [DashboardKomunitasController::class, 'store'])->name('komunitas.store');
            Route::get('/{slug}/edit', [DashboardKomunitasController::class, 'edit'])->name('komunitas.edit');
            Route::put('/{slug}', [DashboardKomunitasController::class, 'update'])->name('komunitas.update');
            Route::get('/delete/{slug}', [DashboardKomunitasController::class, 'destroy'])->name('komunitas.delete');
            Route::get('/{id}/anggota', [DashboardKomunitasController::class, 'anggota'])->name('komunitas.anggota.index');
            Route::get('/anggota/create', [DashboardKomunitasController::class, 'create_anggota'])->name('komunitas.anggota.create');
            Route::post('/anggota/store', [DashboardKomunitasController::class, 'store_anggota'])->name('komunitas.anggota.store');
            Route::get('/anggota/{id}/edit', [DashboardKomunitasController::class, 'edit_anggota'])->name('komunitas.anggota.edit');
            Route::put('/anggota/{id}', [DashboardKomunitasController::class, 'update_anggota'])->name('komunitas.anggota.update');
            Route::delete('/anggota/{id}', [DashboardKomunitasController::class, 'destroy_anggota'])->name('komunitas.anggota.delete');
        });
        // Komunitas Post
        Route::prefix('komunitas-posts')->group(function () {
            Route::get('/', [DashboardKomunitasController::class, 'komunitas_posts'])->name('komunitas_posts.index');
            Route::get('/create', [DashboardKomunitasController::class, 'komunitas_post_create'])->name('komunitas_posts.create');
            Route::post('/store', [DashboardKomunitasController::class, 'komunitas_post_store'])->name('komunitas_posts.store');
            Route::get('/{slug}/edit', [DashboardKomunitasController::class, 'komunitas_post_edit'])->name('komunitas_posts.edit');
            Route::put('/{slug}', [DashboardKomunitasController::class, 'komunitas_post_update'])->name('komunitas_posts.update');
            Route::get('/delete/{slug}', [DashboardKomunitasController::class, 'komunitas_post_destroy'])->name('komunitas_posts.delete');
        });
        // Profile
        Route::prefix('profile')->group(function () {
            // Visi Misi
            Route::get('/visi-misi', [DashboardProfilSekolahController::class, 'visi_misi'])->name('profile.visi-misi');
            Route::put('/visi-misi/{id}', [DashboardProfilSekolahController::class, 'visi_misi_update'])->name('profile.visi-misi.update');
            // Sarpras
            Route::get('/sarpras', [DashboardProfilSekolahController::class, 'sarpras'])->name('profile.sarpras');
            Route::get('/sarpras/create', [DashboardProfilSekolahController::class, 'sarpras_create'])->name('profile.sarpras.create');
            Route::get('/sarpras/{slug}/edit', [DashboardProfilSekolahController::class, 'sarpras_edit'])->name('profile.sarpras.edit');
            Route::put('/sarpras/{slug}', [DashboardProfilSekolahController::class, 'sarpras_update'])->name('profile.sarpras.update');
            Route::post('/sarpras/store', [DashboardProfilSekolahController::class, 'sarpras_store'])->name('profile.sarpras.store');
            Route::get('/sarpras/delete/{slug}', [DashboardProfilSekolahController::class, 'sarpras_destroy'])->name('profile.sarpras.delete');
            // Guru
            Route::get('/guru', [DashboardProfilSekolahController::class, 'guru'])->name('profile.guru');
            Route::get('/guru/create', [DashboardProfilSekolahController::class, 'guru_create'])->name('profile.guru.create');
            Route::post('/guru/store', [DashboardProfilSekolahController::class, 'guru_store'])->name('profile.guru.store');
            Route::get('/guru/{id}/edit', [DashboardProfilSekolahController::class, 'guru_edit'])->name('profile.guru.edit');
            Route::put('/guru/{id}', [DashboardProfilSekolahController::class, 'guru_update'])->name('profile.guru.update');
            Route::get('/guru/delete/{id}', [DashboardProfilSekolahController::class, 'guru_destroy'])->name('profile.guru.delete');
            // Staff
            Route::get('/staff', [DashboardProfilSekolahController::class, 'staff'])->name('profile.staff');
            Route::get('/staff/create', [DashboardProfilSekolahController::class, 'staff_create'])->name('profile.staff.create');
            Route::post('/staff/store', [DashboardProfilSekolahController::class, 'staff_store'])->name('profile.staff.store');
            Route::get('/staff/{id}/edit', [DashboardProfilSekolahController::class, 'staff_edit'])->name('profile.staff.edit');
            Route::put('/staff/{id}', [DashboardProfilSekolahController::class, 'staff_update'])->name('profile.staff.update');
            Route::get('/staff/delete/{id}', [DashboardProfilSekolahController::class, 'staff_destroy'])->name('profile.staff.delete');
            // Kontak
            Route::get('/kontak', [DashboardKontakController::class, 'index'])->name('kontak.index');
            Route::get('/kontak/{id}/edit', [DashboardKontakController::class, 'edit'])->name('kontak.edit');
            Route::put('/kontak/{id}', [DashboardKontakController::class, 'update'])->name('kontak.update');
            // Sekapur Sirih
            Route::get('/sekapursirih', [DashboardProfilSekolahController::class, 'sekapur_sirih'])->name('profile.sekapursirih');
            Route::put('/sekapursirih/{id}', [DashboardProfilSekolahController::class, 'sekapur_sirih_update'])->name('profile.sekapursirih.update');
        });
        // Kelas
        Route::prefix('kelas')->group(function () {
            Route::get('/', [DashboardKelasController::class, 'index'])->name('kelas.index');
            Route::get('/create', [DashboardKelasController::class, 'create'])->name('kelas.create');
            Route::post('/store', [DashboardKelasController::class, 'store'])->name('kelas.store');
            Route::get('/{id}/edit', [DashboardKelasController::class, 'edit'])->name('kelas.edit');
            Route::put('/{id}', [DashboardKelasController::class, 'update'])->name('kelas.update');
            Route::get('/delete/{id}', [DashboardKelasController::class, 'destroy'])->name('kelas.delete');
        });
        // Siswa
        Route::prefix('siswa')->group(function () {
            Route::get('/', [DashboardSiswaController::class, 'index'])->name('siswa.index');
            Route::get('/create', [DashboardSiswaController::class, 'create'])->name('siswa.create');
            Route::post('/store', [DashboardSiswaController::class, 'store'])->name('siswa.store');
            Route::get('/{id}/edit', [DashboardSiswaController::class, 'edit'])->name('siswa.edit');
            Route::put('/{id}', [DashboardSiswaController::class, 'update'])->name('siswa.update');
            Route::get('/delete/{id}', [DashboardSiswaController::class, 'destroy'])->name('siswa.delete');
        });
        // Kewirausahaan
        Route::prefix('produk')->group(function () {
            Route::get('/', [DashboardKewirausahaanProdukController::class, 'index_produk'])->name('produk.index');
            Route::get('/create', [DashboardKewirausahaanProdukController::class, 'create_produk'])->name('produk.create');
            Route::post('/store', [DashboardKewirausahaanProdukController::class, 'store_produk'])->name('produk.store');
            Route::get('/{slug}/edit', [DashboardKewirausahaanProdukController::class, 'edit_produk'])->name('produk.edit');
            Route::put('/{slug}', [DashboardKewirausahaanProdukController::class, 'update_produk'])->name('produk.update');
            Route::get('/delete/{slug}', [DashboardKewirausahaanProdukController::class, 'destroy_produk'])->name('produk.delete');
        });
        Route::prefix('jasa')->group(function () {
            Route::get('/', [DashboardKewirausahaanJasaController::class, 'index_jasa'])->name('jasa.index');
            Route::get('/create', [DashboardKewirausahaanJasaController::class, 'create_jasa'])->name('jasa.create');
            Route::post('/store', [DashboardKewirausahaanJasaController::class, 'store_jasa'])->name('jasa.store');
            Route::get('/{slug}/edit', [DashboardKewirausahaanJasaController::class, 'edit_jasa'])->name('jasa.edit');
            Route::put('/{slug}', [DashboardKewirausahaanJasaController::class, 'update_jasa'])->name('jasa.update');
            Route::get('/delete/{slug}', [DashboardKewirausahaanJasaController::class, 'destroy_jasa'])->name('jasa.delete');
        });
        // Perpus
        Route::prefix('perpus')->group(function () {
            Route::get('/', [DashboardPerpusController::class, 'index'])->name('perpus.index');
            Route::get('/create', [DashboardPerpusController::class, 'create'])->name('perpus.create');
            Route::post('/create', [DashboardPerpusController::class, 'store'])->name('perpus.store');
            Route::get('/{id}/edit', [DashboardPerpusController::class, 'edit'])->name('perpus.edit');
            Route::put('/{id}', [DashboardPerpusController::class, 'update'])->name('perpus.update');
            Route::get('/delete/{id}', [DashboardPerpusController::class, 'destroy'])->name('perpus.delete');
        });
        Route::prefix('mapel')->group(function () {
            Route::get('/', [DashboardMapelController::class, 'index'])->name('mapel.index');
            Route::get('/create', [DashboardMapelController::class, 'create'])->name('mapel.create');
            Route::post('/store', [DashboardMapelController::class, 'store'])->name('mapel.store');
            Route::get('/{id}/edit', [DashboardMapelController::class, 'edit'])->name('mapel.edit');
            Route::put('/{id}', [DashboardMapelController::class, 'update'])->name('mapel.update');
            Route::get('/delete/{id}', [DashboardMapelController::class, 'destroy'])->name('mapel.delete');
        });
        // Ubah hero image
        Route::get('/hero-image', [HomeController::class, 'index_banner'])->name('index.banner');
        Route::get('/hero-image/{id}/edit', [HomeController::class, 'edit_img_hero'])->name('hero.image.edit');
        Route::put('/hero-image/{id}', [HomeController::class, 'update_img_hero'])->name('hero.image.update');
    });
});
