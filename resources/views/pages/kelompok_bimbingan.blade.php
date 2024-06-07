@extends('layouts.main')

@section('konten')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('dist/img/' . $guru_pembimbing->user->gambar_profile) }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $data_guru_pembimbing }}</h3>

                        <p class="text-muted text-center">Guru Pembimbing</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $guru_pembimbing->user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>No Hp</b> <a class="float-right">{{ $guru_pembimbing->user->no_hp }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Alamat</b> <a class="float-right">{{ $guru_pembimbing->alamat }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a class="float-right">{{ $guru_pembimbing->jenis_kelamin }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal Lahir</b> <a class="float-right">{{ $guru_pembimbing->tgl_lahir }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Agama</b> <a class="float-right">{{ $guru_pembimbing->agama }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Wali Kelas</b> <a class="float-right">{{ $guru_pembimbing->wali_kelas }}</a>
                            </li>
                        </ul>

                        {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">

                    <div class=" mb-3">
                        <div class="card-header bgcolor">
                            <h3 class="card-title text-white"> <strong>Kelompok Bimbingan</strong></h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama Siswa</th>
                                        <th>Nisn</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Telphone</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelompok_bimbingan as $key => $kelompok_bimbingan)
                                        <tr>
                                            <td> {{ $key + 1 }}</td>
                                            <td>{{ $kelompok_bimbingan->user->name }}</td>
                                            <td>{{ $kelompok_bimbingan->nisn }}</td>
                                            <td>{{ $kelompok_bimbingan->jenis_kelamin }}</td>
                                            <td>{{ $kelompok_bimbingan->user->no_hp }}</td>
                                            <td>{{ $kelompok_bimbingan->kelas }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
