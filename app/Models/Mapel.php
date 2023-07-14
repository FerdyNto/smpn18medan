<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = ['nama_mapel'];

    public function buku(): HasMany
    {
        return $this->hasMany(Perpus::class, 'id_mapel', 'id');
    }
}
