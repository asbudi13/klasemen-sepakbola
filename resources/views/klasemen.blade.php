@extends('main')

@section('body')
<div class="row mt-3">
    <div class="col-12 col-sm-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>Data Pertandingan</h4>
            </div>
            <div class="card-body text-center">
                <span>Persib</span> 2 - 0 <span>Persija</span>
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
                                <th class="min-w-34px">Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1.</th>
                                <td>Persib</td>
                                <td>1</td>
                                <td>1</td>
                                <td>0</td>
                                <td>0</td>
                                <td>2</td>
                                <td>0</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <th>2.</th>
                                <td>Persija</td>
                                <td>1</td>
                                <td>0</td>
                                <td>0</td>
                                <td>1</td>
                                <td>0</td>
                                <td>2</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
