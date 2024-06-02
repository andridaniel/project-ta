@extends('layouts.main')

@section('konten')
    <div class=" p-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title text-bold "> Data Admin</h3>
                        </div>
                        <div class="col-sm-6">
                            <input type="button" onclick="window.location='{{ route('userregister') }}'"
                                class="btn bgcolor text-white float-right" value="Kembali">
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

                    <table class=" table table-bordered p-auto">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Status</th>
                                <th>Nama Lengkap</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_admin as $key => $dataPengguna)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $dataPengguna->User->Role->nama }}</td>
                                    <td>{{ $dataPengguna->User->name }}</td>

                                    <td width="20%">
                                        <div class="form-row">
                                            <div class="form-group mx-auto">
                                                <form action="{{ route('delete_admin', ['id' => $dataPengguna->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="badge btn bg-danger"><i
                                                            class="fa-sharp fas fa-trash px-1"></i></button>
                                                </form>
                                            </div>

                                            <div class="form-group mx-auto">
                                                <a href="{{ route('edit_admin', ['id' => $dataPengguna->id]) }}"
                                                    class="badge bg-primary">
                                                    <i class=" fas fa-pen px-1"></i>
                                                </a>
                                            </div>

                                            <div class="form-group mx-auto">
                                                <a href="{{ route('detail_admin', ['id' => $dataPengguna->id]) }}"
                                                    class="badge bg-info">
                                                    <i class="fa-sharp fas fa-eye px-1"></i>
                                                </a>
                                            </div>
                                        </div>


                                        {{-- <div class="form-group mx-1">
                                                <a href="{{ route('tambah_data_admin') }}" class="badge bg-dark">
                                                    <i class="nav-icon fas fa-plus px-1"></i> Lengkapi Data
                                                </a>
                                            </div> --}}


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
