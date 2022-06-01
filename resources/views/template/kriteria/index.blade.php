@extends('template.main')
@section('content')
@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">  
@endpush
<section class="section">
    <div class="section-header ">
            <div class="col-lg-4">
                <h1>{{$title??''}}</h1>
            </div>
            <div class="col-lg-3 offset-6">
                <a href="" class="btn btn-info">Tambah {{$title??''}}</a>
            </div>
        </div>

    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama kriteria</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tiger Nixon</td>
                        <td><a href="" class="btn btn-success ">Ubah</a>
                        
                            <form action="" class="d-inline" method="post">
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
  </section>


    @push('js')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    @endpush
@endsection