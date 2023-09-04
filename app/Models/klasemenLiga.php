<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class klasemenLiga extends Model
{
    protected $fillable = [
        'jumlah_main',
        'jumlah_menang',
        'jumlah_kalah',
        'jumlah_seri',
        'jumlah_gol',
        'jumlah_kebobolan',
        'jumlah_total_gol',
        'jumlah_poin',
    ];
}
