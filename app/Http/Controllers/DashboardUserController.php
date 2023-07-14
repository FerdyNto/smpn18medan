<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardUserController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index', [
            'title' => 'Daftar Pengguna',
            'active' => 'user',
            'users' => User::all()
        ]);
    }
}
