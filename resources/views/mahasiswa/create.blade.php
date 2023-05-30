@extends('template.main')
@section('content')
    <section class="section">
        <div class="section-header ">
            <div class="col-lg-4">
                <h1>Tambah Mahasiswa</h1>
            </div>
        </div>
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Nama mahasiswa" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ipk" class="col-sm-2 col-form-label">ipk</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('ipk') is-invalid @enderror" name="ipk">
                                <option value="4" {{ old('ipk') == '4'?'selected':'' }}>> 3.82</option>
                                <option value="3" {{ old('ipk') == '3'?'selected':'' }}>3.56 - 3.82</option>
                                <option value="2" {{ old('ipk') == '2'?'selected':'' }}>3.00 - 3.55</option>
                                <option value="1" {{ old('ipk') == '1'?'selected':'' }}>
                                    < 3.00</option>
                            </select>
                            @error('ipk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_penghasilan_orang_tua" class="col-sm-2 col-form-label">Total Penghasilan Orang Tua </label>
                        <div class="col-sm-10">
                            <select class="form-control @error('total_penghasilan_orang_tua') is-invalid @enderror" name="total_penghasilan_orang_tua">
                                <option value="4" {{ old('total_penghasilan_orang_tua') == '4'?'selected':'' }}>
                                    < 1,5 Juta</option>
                                <option value="3" {{ old('total_penghasilan_orang_tua') == '3'?'selected':'' }}>1,5 - 4 Juta</option>
                                <option value="2" {{ old('total_penghasilan_orang_tua') == '2'?'selected':'' }}>> 4 - 7 Juta </option>
                                <option value="1" {{ old('total_penghasilan_orang_tua') == '1'?'selected':'' }}>> 7 Juta </option>
                            </select>
                            @error('total_penghasilan_orang_tua')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_anggota_keluarga" class="col-sm-2 col-form-label">Jumlah Anggota Keluarga </label>
                        <div class="col-sm-10">
                            <select class="form-control @error('jumlah_anggota_keluarga') is-invalid @enderror" name="jumlah_anggota_keluarga">
                                <option value="4" {{ old('jumlah_anggota_keluarga') == '4'?'selected':'' }}>> 7</option>
                                <option value="3" {{ old('jumlah_anggota_keluarga') == '3'?'selected':'' }}>4 - 7 orng </option>
                                <option value="2" {{ old('jumlah_anggota_keluarga') == '2'?'selected':'' }}>1 - 3 orng</option>
                            </select>
                            @error('jumlah_anggota_keluarga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('semester') is-invalid @enderror" name="semester">
                                <option value="4" {{ old('semester') == '4'?'selected':'' }}>6-8 semester</option>
                                <option value="3" {{ old('semester') == '3'?'selected':'' }}>3-5 semester</option>
                                <option value="2" {{ old('semester') == '2'?'selected':'' }}>
                                    < 2 semester </option>
                            </select>
                            @error('semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
