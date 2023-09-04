@extends('main')

@section('body')
<div class="row mt-3">
    <div class="col-12 col-sm-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>Input Klub Sepak Bola</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="namaKlub" class="form-label">Nama Klub</label>
                    <input type="text" class="form-control is-invalid" id="namaKlub"
                        placeholder="cth: Persib" name="nama_klub">
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kotaKlub" class="form-label">Kota Klub</label>
                    <input type="text" class="form-control is-invalid" id="kotaKlub"
                        placeholder="cth: Bandung" name="kota_klub">
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" style="width: 100%" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
