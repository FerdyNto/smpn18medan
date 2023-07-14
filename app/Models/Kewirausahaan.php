<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewirausahaan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug', 'deskripsi', 'gambar', 'kontak', 'pesan', 'harga', 'kategori'];
}
