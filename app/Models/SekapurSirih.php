<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekapurSirih extends Model
{
    use HasFactory;
    protected $fillable = ['sekapursirih', 'nama_kepsek', 'gambar_kepsek'];
}
