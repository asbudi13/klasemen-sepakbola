@extends('main')

@section('body')
<form action="{{ route('simpanKlub') }}" method="POST">
    @csrf
    <div class="row mt-3">
        <div class="col-12 col-sm-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Input Klub Sepak Bola</h4>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                           {{ Session::get('success'); }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="namaKlub" class="form-label">Nama Klub</label>
                        <input type="text" class="form-control @error('nama_klub') is-invalid @enderror" id="namaKlub"
                            placeholder="cth: Persib" name="nama_klub" value="{{ old('nama_klub') }}">
                        @error('nama_klub')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kotaKlub" class="form-label">Kota Klub</label>
                        <input type="text" class="form-control @error('kota_klub') is-invalid @enderror" id="kotaKlub"
                            placeholder="cth: Bandung" name="kota_klub" value="{{ old('kota_klub') }}">
                        @error('kota_klub')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" style="width: 100%" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
