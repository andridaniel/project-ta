@extends('layouts.main')

@section('konten')
    <!-- form start -->

    <div class=" p-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-sm-10">
                            <h3 class="card-title text-bold "> Data Siswa Bimbingan</h3>
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
                                <th>Gambar</th>
                                <th>Nisn</th>
                                <th>Nama Lengkap</th>
                                <th>No Hp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $key => $siswas)
                                <tr>
                                    <td>{{ $siswa->firstItem() + $key }}</td>
                                    <td class="mx-auto">
                                        <div class="widget-user-image">
                                            <img class="img-circle elevation-2"
                                                src="{{ asset('dist/img/' . $siswas->user->gambar_profile) }}"
                                                alt="User Avatar" width="50px">
                                        </div>
                                    </td>
                                    <td>{{ $siswas->nisn }}</td>
                                    <td>{{ $siswas->User->name }}</td>
                                    <td>{{ $siswas->User->no_hp }}</td>

                                    <td width="20%">
                                        <div class="form-group">
                                            <div class="mt-3">
                                                <a href="{{ route('detail_siswa_bimbingan', ['id' => $siswas->id]) }}"
                                                    class="btn bg-info text-white btn-block">Selengkapnya</a>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix ">
                    <div class="float-right">
                        {{ $siswa->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
