@extends('template.main')
@section('content')
    @push('css')
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    @endpush
    <section class="section">
        <div class="section-header ">
            <div class="col-lg-4">
                <h1>Data Kriteria</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama kriteria</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allKriteria as $kriteria)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$kriteria->nama}}</td>
                            <td>
                                <a href="{{route('kriteria.edit',['id'=>$kriteria->id])}}" class="btn btn-success ">Ubah</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>


    @push('js')
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    @endpush
@endsection
