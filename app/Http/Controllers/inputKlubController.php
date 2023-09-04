<?php

namespace App\Http\Controllers;

use App\Models\dataKlub;
use App\Models\klasemenLiga;
use Illuminate\Http\Request;

class inputKlubController extends Controller
{
    // return view page
    public function index(){
        return view('input_klub',[
            'title' => 'Input Klub'
        ]);
    }

    // save data
    public function input(Request $request){
        // validasi data
        $request->validate(
            [
                'nama_klub' => 'required|max:150|unique:data_klubs',
                'kota_klub' => 'required|max:150',
            ],
            [
                'nama_klub.required' => 'Nama klub tidak boleh kosong.',
                'nama_klub.max' => 'Maksimal input adalah 150 karakter.',
                'nama_klub.unique' => 'Nama Klub sudah ada.',

                'kota_klub.required' => 'Kota klub tidak boleh kosong.',
                'kota_klub.max' => 'Maksimal input adalah 150 karakter.',
            ]
        );

        // inisiasi data input
        $namaKlub = strtoupper(trim($request->nama_klub));
        $kotaKlub = ucwords(trim($request->kota_klub));

        $klub = new dataKlub();

        $klub->id_klub = strtolower($request->nama_klub);
        $klub->nama_klub = $namaKlub;
        $klub->kota_klub = $kotaKlub;
        $klub->save();

        $klasemen = new klasemenLiga();

        $klasemen->id_klub = strtolower($request->nama_klub);;
        $klasemen->save();

        return redirect()->route('inputKlub')->with('success', 'Data Klub berhasil disimpan!');
    }

}
