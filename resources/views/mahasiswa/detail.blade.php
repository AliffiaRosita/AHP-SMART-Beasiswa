@extends('template.main')
@section('content')
    <section class="section">
        <div class="section-header ">
            <div class="col-lg-4">
                <h1>Detail Mahasiswa</h1>
            </div>
        </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input disabled type="text" class="form-control" id="nama"
                                name="nama" placeholder="Nama mahasiswa" value="{{ $mahasiswa->nama }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ipk" class="col-sm-2 col-form-label">ipk</label>
                        <div class="col-sm-10">
                            <select class="form-control" disabled>
                                <option value="4" {{ $mahasiswa->kriteria[0]->pivot->nilai == '4'?'selected':'' }}>> 3.82</option>
                                <option value="3" {{ $mahasiswa->kriteria[0]->pivot->nilai == '3'?'selected':'' }}>3.56 - 3.82</option>
                                <option value="2" {{ $mahasiswa->kriteria[0]->pivot->nilai == '2'?'selected':'' }}>3.00 - 3.55</option>
                                <option value="1" {{ $mahasiswa->kriteria[0]->pivot->nilai == '1'?'selected':'' }}>
                                    < 3.00</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_penghasilan_orang_tua" class="col-sm-2 col-form-label">Total Penghasilan Orang Tua </label>
                        <div class="col-sm-10">
                            <select class="form-control" disabled>
                                <option value="4" {{ $mahasiswa->kriteria[1]->pivot->nilai == '4'?'selected':'' }}>
                                    < 1,5 Juta</option>
                                <option value="3" {{ $mahasiswa->kriteria[1]->pivot->nilai == '3'?'selected':'' }}>1,5 - 4 Juta</option>
                                <option value="2" {{ $mahasiswa->kriteria[1]->pivot->nilai == '2'?'selected':'' }}>> 4 - 7 Juta </option>
                                <option value="1" {{ $mahasiswa->kriteria[1]->pivot->nilai == '1'?'selected':'' }}>> 7 Juta </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_anggota_keluarga" class="col-sm-2 col-form-label">Jumlah Anggota Keluarga </label>
                        <div class="col-sm-10">
                            <select class="form-control" disabled>
                                <option value="4" {{ $mahasiswa->kriteria[2]->pivot->nilai == '4'?'selected':'' }}>> 7</option>
                                <option value="3" {{ $mahasiswa->kriteria[2]->pivot->nilai == '3'?'selected':'' }}>4 - 7 orng </option>
                                <option value="2" {{ $mahasiswa->kriteria[2]->pivot->nilai == '2'?'selected':'' }}>1 - 3 orng</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                        <div class="col-sm-10">
                            <select class="form-control" disabled>
                                <option value="4" {{ $mahasiswa->kriteria[3]->pivot->nilai == '4'?'selected':'' }}>6-8 semester</option>
                                <option value="3" {{ $mahasiswa->kriteria[3]->pivot->nilai == '3'?'selected':'' }}>3-5 semester</option>
                                <option value="2" {{ $mahasiswa->kriteria[3]->pivot->nilai == '2'?'selected':'' }}>
                                    < 2 semester </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
