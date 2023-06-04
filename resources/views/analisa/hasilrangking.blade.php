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


    </section>
@endsection
