@extends('template.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>ANALISIS PENDUKUNG KEPUTUSAN BANTUAN BEASISWA CENDIKIA MENGGUNAKAN METODE AHP – SMART </h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Matriks Perbandingan Berpasangan</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Kriteria</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th scope="col">{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @for ($x = 0; $x <= $jumlahkriteria - 1; $x++)
                                    <tr>
                                        <th scope="row">{{ $kriterias[$x]->nama }}</th>
                                        @for ($y = 0; $y <= $jumlahkriteria - 1; $y++)
                                            <td>{{ round($matrikskriteria[$y][$x], 3) }}</td>
                                        @endfor
                                    </tr>
                                @endfor
                            </tbody>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Jumlah</th>
                                    @foreach ($jmlpk as $jml)
                                        <th scope="col">{{ round($jml, 3) }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Matriks Nilai Kriteria</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Kriteria</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th scope="col">{{ $kriteria->nama }}</th>
                                    @endforeach
                                    <th scope="col">priority vector</th>
                                    <th scope="col">Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($x = 0; $x <= $jumlahkriteria - 1; $x++)
                                    <tr>
                                        <th scope="row">{{ $kriterias[$x]->nama }}</th>
                                        @for ($y = 0; $y <= $jumlahkriteria - 1; $y++)
                                            <td>{{ round($matrikskriterianormal[$y][$x], 3) }}</td>
                                        @endfor
                                        <td>{{ round($jmlpb[$x], 3) }}</td>
                                        <td>{{ round($bobotKriteria[$x], 3) }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" colspan="{{ $jumlahkriteria + 2 }}">Nilai Eigen Value</th>
                                    <th scope="col">{{ round(array_sum($eigenvalue), 3) }}</th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="{{ $jumlahkriteria + 2 }}">Random Index</th>
                                    <th scope="col">{{ round($RiValue, 3) }}</th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="{{ $jumlahkriteria + 2 }}">Consistency Ratio</th>
                                    <th scope="col">{{ round($consistencyRatio, 3) }}</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if ($consistencyRatio < 0.1)
                    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                        <span class="badge badge-pill badge-primary">Success</span>
                        <p>
                            Sangat Baik Nilai Konsistensi anda kurang dari 10% yaitu sebesar
                            <strong> {{ round($consistencyRatio, 3) }}</strong>
                            Silahkan Menuju Perhitungan alternatif dengan menekan tombol dibawah ini
                        </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <a href="{{route('perhitungan.rangking',['id'=>$riwayatPerhitungan->id])}}" class="btn btn-outline-success btn-lg btn-block"><i
                                class="fa fa-location-arrow"></i>&nbsp;Lanjutkan</a>
                    </div>
                @else
                    <div class="sufee-alert alert with-close alert-danger  alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger ">Success</span>
                        <p>
                            Sayang sekali Nilai Konsistensi anda Lebih dari 10% yaitu sebesar
                            <strong> {{ round($consistencyRatio, 3) }}</strong>
                            Silahkan mengisi kembali nilai perbandingan antar kriteria
                        </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-warning btn-lg btn-block"><i
                                class="fa fa-location-arrow"></i>&nbsp;Kembali</a>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
