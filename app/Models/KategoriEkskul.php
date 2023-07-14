<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriEkskul extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori_ekskul', 'gambar'];
}
