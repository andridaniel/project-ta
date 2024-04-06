@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        <div>
                            <h3 class="card-title text-bold "> Data Siswa</h3>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Status</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_siswa as $key => $dataPengguna)
                                <tr>
                                    <td> {{ $key + 1 }}</td>
                                    <td>{{ $dataPengguna->User->Role->nama }}</td>
                                    <td>{{ $dataPengguna->User->name }}</td>
                                    <td>{{ $dataPengguna->User->email }}</td>
                                    <td>
                                        <div class="form-row ">
                                            <div class="form-group">
                                                <form action="{{ route('delete_siswa', ['id' => $dataPengguna->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="badge bg-danger"><i
                                                            class="nav-icon fas fa-trash-alt px-1"></i>Delete</button>
                                                </form>
                                            </div>

                                            <div class="form-group mx-1">
                                                <a href="{{ route('edit_siswa', ['id' => $dataPengguna->id]) }}"
                                                    class="badge bg-warning">
                                                    <i class="nav-icon fas fa-edit px-1"></i> Update
                                                </a>
                                            </div>

                                            <div class="form-group mx-1">
                                                <a href="{{ route('detail_siswa', ['id' => $dataPengguna->id]) }}"
                                                    class="badge bg-info">
                                                    <i class="nav-icon fas fa-info px-1"></i> Detail
                                                </a>
                                            </div>

                                            {{-- <div class="form-group mx-1">
                                                <a href="{{ route('tambah_data_siswa') }}" class="badge bg-dark">
                                                    <i class="nav-icon fas fa-plus px-1"></i> Lengkapi Data
                                                </a>
                                            </div> --}}

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
