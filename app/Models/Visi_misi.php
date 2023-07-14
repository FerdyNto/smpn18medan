<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visi_misi extends Model
{
    use HasFactory;
    protected $fillable = ['visi', 'misi', 'tujuan'];
}
