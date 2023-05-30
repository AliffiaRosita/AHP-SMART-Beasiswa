@extends('template.main')
@section('content')
    @push('css')
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    @endpush
    <section class="section">
        <div class="section-header ">
            <div class="col-lg-4">
                <h1>Data Mahasiswa</h1>
            </div>
            <div class="col-lg-3 offset-6">
                <a href="{{route('mahasiswa.create')}}" class="btn btn-info">Tambah</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allMahasiswa as $mahasiswa)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$mahasiswa->nama}}</td>
                            <td>
                                <a href="{{route('mahasiswa.show',['mahasiswa'=>$mahasiswa])}}" class="btn btn-info ">Detail</a>
                                <a href="{{route('mahasiswa.edit',['mahasiswa'=>$mahasiswa])}}" class="btn btn-success ">Ubah</a>
                                <form class="d-inline"
                                        onsubmit="return confirm('Apakah anda ingin menghapus mahasiswa secara permanen?')"
                                        action="{{route('mahasiswa.destroy', $mahasiswa)}}"
                                        method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Hapus</button>
                                        </form>
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
