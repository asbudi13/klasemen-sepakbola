<?php

namespace App\Http\Controllers;

use App\Models\dataKlub;
use App\Models\dataPertandingan;
use App\Models\klasemenLiga;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;

class inputSkorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $dataKlub = dataKlub::select('id_klub','nama_klub','kota_klub')->get();

        return view('input_skor',[
            'title' => 'Input Skor',
            'data_klub' => $dataKlub,
        ]);
    }

    public function input(Request $request){
        $klub_satu = $request->klub1;
        $klub_dua = $request->klub2;
        $skor_klub_satu = $request->skor1;
        $skor_klub_dua = $request->skor2;

        $error_me = array();
        foreach($klub_satu as $key => $value_klub_satu){
            $kandang = $value_klub_satu;
            $tandang = $klub_dua[$key];
            $skorKandang = $skor_klub_satu[$key] == '' ? '0' : $skor_klub_satu[$key];
            $skortandang = $skor_klub_dua[$key] == '' ? '0' : $skor_klub_dua[$key];

            $pertanding = 'Pertanding ' . $key+1;
            if($kandang == $tandang){
                $error_me[] = $pertanding . ' gagal di input karena klub yang bertanding sama: ' . $kandang . ' - ' . $tandang;
                continue;
            }else{
                $checkPertanding = dataPertandingan::where(function (Builder $query) use ($kandang, $tandang) {
                    $query->where('klub_satu', $kandang)
                          ->where('klub_dua', $tandang)
                          ->orWhere(function ($query) use ($kandang, $tandang) {
                              $query->where('klub_satu', $tandang)
                                    ->where('klub_dua', $kandang);
                          });
                })->get();

                if($checkPertanding->count() > 0){
                    $error_me[] = $pertanding . ' gagal di input karena pertanding sudah di input: ' . $kandang . ' - ' . $tandang;
                    continue;
                }else{

                    $dataPertandingan = new dataPertandingan();

                    $dataPertandingan->klub_satu = $kandang;
                    $dataPertandingan->klub_dua = $tandang;
                    $dataPertandingan->skor_klub_satu = $skorKandang;
                    $dataPertandingan->skor_klub_dua = $skortandang;

                    $dataPertandingan->save();

                    $poin_klub_satu = $skorKandang > $skortandang ? 3 : ($skorKandang < $skortandang ? 0 : 1);
                    $poin_klub_dua = $skorKandang < $skortandang ? 3 : ($skorKandang > $skortandang ? 0 : 1);

                    $klub_satu_menang = $poin_klub_satu == 3 ? 1 : 0;
                    $klub_satu_kalah = $poin_klub_satu == 0 ? 1 : 0;
                    $klub_satu_seri = $poin_klub_satu == 1 ? 1 : 0;

                    $klub_dua_menang = $poin_klub_dua == 3 ? 1 : 0;
                    $klub_dua_kalah = $poin_klub_dua == 0 ? 1 : 0;
                    $klub_dua_seri = $poin_klub_dua == 1 ? 1 : 0;

                    $getDataKlasemenKlubSatu = klasemenLiga::select('jumlah_main','jumlah_menang','jumlah_kalah','jumlah_seri','jumlah_gol','jumlah_kebobolan','jumlah_total_gol','jumlah_poin')
                                                            ->where('id_klub', $kandang)->get()[0];
                    $getDataKlasemenKlubDua = klasemenLiga::select('jumlah_main','jumlah_menang','jumlah_kalah','jumlah_seri','jumlah_gol','jumlah_kebobolan','jumlah_total_gol','jumlah_poin')
                                                            ->where('id_klub', $tandang)->get()[0];


                    $inputKlubSatu = klasemenLiga::where('id_klub', $kandang)->update([
                        'jumlah_main' => $getDataKlasemenKlubSatu['jumlah_main']+1,
                        'jumlah_menang' => $getDataKlasemenKlubSatu['jumlah_menang']+$klub_satu_menang,
                        'jumlah_kalah' => $getDataKlasemenKlubSatu['jumlah_kalah']+$klub_satu_kalah,
                        'jumlah_seri' => $getDataKlasemenKlubSatu['jumlah_seri']+$klub_satu_seri,
                        'jumlah_gol' => $getDataKlasemenKlubSatu['jumlah_gol']+$skorKandang,
                        'jumlah_kebobolan' => $getDataKlasemenKlubSatu['jumlah_kebobolan']+$skortandang,
                        'jumlah_total_gol' => $getDataKlasemenKlubSatu['jumlah_total_gol']+($skorKandang-$skortandang),
                        'jumlah_poin' => $getDataKlasemenKlubSatu['jumlah_poin']+$poin_klub_satu,
                    ]);

                    $inputKlubDua = klasemenLiga::where('id_klub', $tandang)->update([
                        'jumlah_main' => $getDataKlasemenKlubDua['jumlah_main']+1,
                        'jumlah_menang' => $getDataKlasemenKlubDua['jumlah_menang']+$klub_dua_menang,
                        'jumlah_kalah' => $getDataKlasemenKlubDua['jumlah_kalah']+$klub_dua_kalah,
                        'jumlah_seri' => $getDataKlasemenKlubDua['jumlah_seri']+$klub_dua_seri,
                        'jumlah_gol' => $getDataKlasemenKlubDua['jumlah_gol']+$skortandang,
                        'jumlah_kebobolan' => $getDataKlasemenKlubDua['jumlah_kebobolan']+$skorKandang,
                        'jumlah_total_gol' => $getDataKlasemenKlubDua['jumlah_total_gol']+($skortandang-$skorKandang),
                        'jumlah_poin' => $getDataKlasemenKlubDua['jumlah_poin']+$poin_klub_dua,
                    ]);
                }

            }

        }
        if(count($error_me) == 0){
            return redirect()->route('inputSkor')->with('success', 'Data Klub berhasil disimpan!');
        }else{
            return redirect()->route('inputSkor')->with('alert', $error_me);
        }

    }

}
