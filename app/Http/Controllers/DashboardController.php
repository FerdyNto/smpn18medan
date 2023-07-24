<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\KomunitasPost;
use App\Models\Prestasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'berita' => Berita::where('id_kategori', 1)->get(),
            'info' => Berita::where('id_kategori', 2)->get(),
            'prestasi' => Prestasi::all(),
            'komunitas' => KomunitasPost::all(),
            'users'=> User::all()
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
