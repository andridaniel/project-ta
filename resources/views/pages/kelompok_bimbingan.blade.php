@extends('layouts.main')

@section('konten')
    <div class="card mt-5 mx-auto mb-5">
        <div class=" mx-3 mb-5 mt-5">
            <div class="card-header bgcolor">
                <h3 class="card-title text-white"> <strong>Klompok Bimbingan</strong></h3>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelompok_bimbingan as $key => $kelompok_bimbingan)
                            <tr>
                                <td> {{ $key + 1 }}</td>
                                <td>{{ $kelompok_bimbingan->user->name }}</td>
                                <td>{{ $kelompok_bimbingan->nisn }}</td>
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
@endsection
