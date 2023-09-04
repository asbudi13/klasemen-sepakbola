@extends('main')

@section('body')
<div class="row mt-3">
    <div class="col-12 col-sm-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>Data Pertandingan</h4>
            </div>
            <div class="card-body text-center">
                @foreach ($pertandingan as $item)
                    <span>{{ strtoupper($item['klub_satu']) }}</span> {{ $item['skor_klub_satu'] }} - {{ $item['skor_klub_dua'] }} <span>{{ strtoupper($item['klub_dua']) }}</span> <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-sm-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>Klasemen</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="min-w-25px">No</th>
                                <th class="min-w-100px">Klub</th>
                                <th class="min-w-25px">Ma</th>
                                <th class="min-w-25px">Me</th>
                                <th class="min-w-25px">S</th>
                                <th class="min-w-25px">K</th>
                                <th class="min-w-25px">GM</th>
                                <th class="min-w-25px">GK</th>
                                <th class="min-w-25px">GS</th>
                                <th class="min-w-34px">Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKlasemen as $item)
                                <tr>
                                    <th>{{ $no++ }}.</th>
                                    <td>{{ $item['klub'] }}</td>
                                    <td class="text-end">{{ $item['jumlah_main'] }}</td>
                                    <td class="text-end">{{ $item['jumlah_menang'] }}</td>
                                    <td class="text-end">{{ $item['jumlah_seri'] }}</td>
                                    <td class="text-end">{{ $item['jumlah_kalah'] }}</td>
                                    <td class="text-end">{{ $item['jumlah_gol'] }}</td>
                                    <td class="text-end">{{ $item['jumlah_kebobolan'] }}</td>
                                    <td class="text-end">{{ $item['jumlah_total_gol'] }}</td>
                                    <td class="text-end">{{ $item['jumlah_poin'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
