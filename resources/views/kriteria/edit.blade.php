@extends('template.main')
@section('content')
    <section class="section">
        <div class="section-header ">
            <div class="col-lg-4">
                <h1>Ubah Kriteria</h1>
            </div>
        </div>
        <form action="{{route('kriteria.update',['id'=>$kriteria->id])}}" method="POST">
            @method('PUT')
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4>Input Text</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $kriteria->nama }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="benefit"
                                    value="benefit" {{ $kriteria->kategori == 'benefit' ? 'checked' : '' }}>
                                <label class="form-check-label" for="benefit">Benefit</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kategori" id="cost" value="cost"
                                    {{ $kriteria->kategori == 'cost' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cost">Cost</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
