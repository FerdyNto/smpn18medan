<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug', 'gambar', 'kategori_ekskul_id', 'link_daftar', 'pembina', 'deskripsi'];

    public function kategoriekskul(): BelongsTo
    {
        return $this->belongsTo(KategoriEkskul::class, 'kategori_ekskul_id');
    }
}
