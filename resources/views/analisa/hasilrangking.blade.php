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
                        <strong class="card-title">Tabel Alternatif Kriteria</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th scope="col">{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @for ($x = 0; $x < count($semuaMahasiswa); $x++)
                                    <tr>
                                        <th scope="row">{{ $semuaMahasiswa[$x]->nama }}</th>
                                        @foreach ($semuaMahasiswa[$x]->kriteria as $kriteria)
                                            <td>{{ $kriteria->pivot->nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endfor
                            </tbody>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    @foreach ($kriterias as $kriteria)
                                        <th scope="col">{{ $kriteria->kategori }}</th>
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
                        <strong class="card-title">Tabel Nilai Utility</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th scope="col">{{ $kriteria->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @for ($x = 0; $x < count($semuaMahasiswa); $x++)
                                    <tr>
                                        <th scope="row">{{ $semuaMahasiswa[$x]->nama }}</th>
                                        @for ($y = 0; $y < count($kriterias); $y++)
                                            <td>{{ round($tabelUtility[$x][$y], 7) }}</td>
                                        @endfor
                                    </tr>
                                @endfor
                            </tbody>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Bobot</th>
                                    @foreach ($hasilBobot as $bobot)
                                        <th scope="col">{{ round($bobot->nilai, 3) }}</th>
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
                        <strong class="card-title">Tabel Nilai Akhir</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Alternatif</th>
                                    @foreach ($kriterias as $kriteria)
                                        <th scope="col">{{ $kriteria->nama }}</th>
                                    @endforeach
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($x = 0; $x < count($semuaMahasiswa); $x++)
                                    <tr>
                                        <th scope="row">{{ $semuaMahasiswa[$x]->nama }}</th>
                                        @for ($y = 0; $y < count($kriterias); $y++)
                                            <td>{{ round($tabelNilaiAkhir[$x][$y], 7) }}</td>
                                        @endfor
                                        <td>{{ round($hasil[$x], 7) }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tabel Rangking</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Alternatif</th>
                                    <th>Hasil</th>
                                    <th>Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($x = 0; $x < count($rangkings); $x++)
                                    <tr>
                                        <th scope="row">{{ $rangkings[$x]->mahasiswa->nama }}</th>
                                        <td>{{ $rangkings[$x]->hasil }}</td>
                                        <td>{{ $x + 1 }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
