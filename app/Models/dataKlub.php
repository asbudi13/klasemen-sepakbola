<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataKlub extends Model{

    protected $fillable = [
        'id_klub',
        'nama_klub',
        'kota_klub',
    ];
}
