<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPertandingan extends Model
{
    protected $fillable = [
        'klub_satu',
        'klub_dua',
        'skor_klub_satu',
        'skor_klub_dua',
    ];
}
