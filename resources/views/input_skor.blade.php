@extends('main')

@section('body')
<form action="{{ route('simpanSkor') }}" method="POST">
    @csrf
    <div class="row mt-3">
        <div class="col-12 col-sm-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Input Skor Pertandingan</h4>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                           {{ Session::get('success'); }}
                        </div>
                    @endif
                    @if(Session::has('alert'))
                        <div class="alert alert-warning" role="alert">
                            <h5>Perhatian1</h5>
                            @foreach (Session::get('alert') as $item)
                            &bull;	{{ $item }} <br>
                            @endforeach
                        </div>
                    @endif
                    <div id="match" class="border p-3">
                        <label for="" class="form-label title-match">Pertandingan 1</label>
                        <hr>
                        <div class="row mb-2">
                            <label for="" class="col-form-label col-12 col-sm-3">Klub 1</label>
                            <div class="col-12 col-sm-5">
                                <select class="form-select" required name="klub1[]">
                                    <option value="" selected>Pilih Klub</option>
                                    @foreach ($data_klub as $klub)
                                        <option value="{{ $klub['id_klub'] }}">{{ $klub['nama_klub'] . ' - ' . $klub['kota_klub'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-4">
                                <input type="number" class="form-control" name="skor1[]" placeholder="input skor">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="" class="col-form-label col-12 col-sm-3">Klub 2</label>
                            <div class="col-12 col-sm-5">
                                <select class="form-select" required name="klub2[]">
                                    <option value="" selected>Pilih Klub</option>
                                    @foreach ($data_klub as $klub)
                                        <option value="{{ $klub['id_klub'] }}">{{ $klub['nama_klub'] . ' - ' . $klub['kota_klub'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-4">
                                <input type="number" class="form-control" name="skor2[]" placeholder="input skor">
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-2">
                        <button type="button" class="btn btn-secondary add">Add</button>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" style="width: 100%" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const addButton = document.querySelector(".add");
        const matchContainer = document.getElementById("match");
        let matchCounter = 1;

        addButton.addEventListener("click", function () {
            matchCounter++;
            const newMatch = matchContainer.cloneNode(true);
            matchContainer.parentNode.insertBefore(newMatch, matchContainer.nextSibling);
            updateLabel();
        });

        function updateLabel() {
            const labels = document.querySelectorAll(".title-match");
            labels.forEach(function (label, index) {
                label.textContent = "Pertandingan " + (index + 1);
            });
        }
    });
</script>

@endsection
