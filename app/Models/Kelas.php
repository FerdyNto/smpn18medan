<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kelas'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id');
    }
}
