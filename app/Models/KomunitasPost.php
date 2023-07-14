<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KomunitasPost extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'slug', 'isi_post', 'gambar', 'id_komunitas'];

    public function komunitas(): BelongsTo
    {
        return $this->belongsTo(Komunitas::class, 'id_komunitas');
    }
}
