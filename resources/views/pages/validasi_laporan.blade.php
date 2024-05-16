@extends('layouts.main')

@section('konten')
    <div class="card mt-5 mx-auto mb-5">
        @if (auth()->user()->role_id == '2')
            <div class="col-md-10 mx-auto mt-5 mb-5">
                <div class="card-header bgcolor">
                    <h3 class="card-title text-white"> <strong>Laporan Mingguan Siswa</strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Siswa</th>
                                <th>Nisn</th>
                                <th>No Handphone</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($kelompok_bimbingan as $key => $kelompok_bimbingan) --}}
                            <tr>
                                <td> test</td>
                                <td>test</td>
                                <td> test</td>
                                <td> test</td>
                                <td>test</td>
                                <td>
                                    <div class="form-group mx-1">
                                        <a href="" class="badge bg-info">
                                            <i class="nav-icon fas fa-info px-1"></i> Informasi
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        @endif
        <!-- /.card -->

    </div>
    </div>
@endsection
