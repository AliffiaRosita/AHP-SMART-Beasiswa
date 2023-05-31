@extends('template.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>ANALISIS PENDUKUNG KEPUTUSAN BANTUAN BEASISWA CENDIKIA MENGGUNAKAN METODE AHP – MAUT </h1>
          </div>
          <div class="row">
              <form action="" method="post" class="form-horizontal">
                  @csrf
                  <div class="row">
                      @for ($i = 0; $i <= $jumlahkriteria - 2; $i++)
                          @for ($j = $i + 1; $j <= $jumlahkriteria - 1; $j++)
                              @php
                                  $urut++;
                                  $nilai = null;
                                  $first = true;
                              @endphp
                              <div class="col-lg-6">
                                  <div class="card">
                                      <div class="card-header">
                                          <strong>Kriteria</strong>
                                      </div>
                                      <div class="card-body card-block">

                                          <div class="row form-group">
                                              <div class="col col-md-4"><label for="hf-email"
                                                      class=" form-control-label">Kriteria</label></div>
                                              <div class="col-12 col-md-8">


                                                  <div class="custom-control custom-radio custom-control-inline">
                                                      <input required type="radio" id="{{ $kriteria[$i]->nama . $urut }}"
                                                          name="pilihan[{{ $urut }}]" value="1"
                                                          class="custom-control-input"
                                                          {{ !$first ? ($nilai >= 1 ? 'checked' : '') : '' }}>
                                                      <label class="custom-control-label"
                                                          for="{{ $kriteria[$i]->nama . $urut }}">{{ $kriteria[$i]->nama }}</label>
                                                  </div>
                                                  <div class="custom-control custom-radio custom-control-inline">
                                                      <input required type="radio" id="{{ $kriteria[$j]->nama . $urut }}"
                                                          name="pilihan[{{ $urut }}]" value="2"
                                                          class="custom-control-input"
                                                          {{ !$first ? ($nilai < 1 ? 'checked' : '') : '' }}>
                                                      <label class="custom-control-label"
                                                          for="{{ $kriteria[$j]->nama . $urut }}">{{ $kriteria[$j]->nama }}</label>
                                                  </div>
                                                  <br>
                                                  <span class="help-block">Pilihlah kriteria yang paling penting</span>
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col col-md-4"><label for="nilai" class=" form-control-label">Nilai
                                                      Perbandingan</label></div>
                                              <div class="col-12 col-md-8">
                                                  <input type="float" max="9" id="nilai"
                                                      value="{{ !$first ? ($nilai >= 1 ? $nilai : round(1 / $nilai)) : '' }}"
                                                      name="bobot[{{ $urut }}]" placeholder="masukkan nilai"
                                                      class="form-control" required>

                                                  <span class="help-block">Masukkan Nilai Perbandingan antara kedua
                                                      kriteria</span>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          @endfor
                      @endfor

                  </div>


                  <div class="row">
                      <div class="col-md-6 offset-md-3">
                          <button type="submit" class="btn btn-outline-success btn-lg btn-block"><i
                                  class="fa fa-location-arrow"></i>&nbsp;Analisa Bobot Kriteria</button>
                      </div>
                  </div>


              </form>
          </div>
    </section>
@endsection
