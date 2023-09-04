<?php

namespace App\Http\Controllers;

use App\Models\dataPertandingan;
use App\Models\klasemenLiga;
use Illuminate\Http\Request;

class klasemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(){
        $dataPertandingan = dataPertandingan::select('klub_satu','klub_dua','skor_klub_satu','skor_klub_dua')->get();

        $dataKlasemen = klasemenLiga::leftJoin('data_klubs','klasemen_ligas.id_klub','=','data_klubs.id_klub')
                                    ->select('klasemen_ligas.*','data_klubs.nama_klub AS klub')
                                    ->orderByDesc('jumlah_poin')
                                    ->orderByDesc('jumlah_total_gol')
                                    ->orderByDesc('jumlah_main')
                                    ->get();

        return view('klasemen',[
            'title' => 'Klasemen',
            'pertandingan' => $dataPertandingan,
            'dataKlasemen' => $dataKlasemen,
            'no' => 1,
        ]);
    }


}
