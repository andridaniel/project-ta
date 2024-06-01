@extends('layouts.main')

@section('konten')
    <div class="card">
        <div class="card m-2">
            <div class="card-header bgcolor">
                <h3 class="text-bold card-title text-light">Data Laporan Monitoring</h3>
            </div>

            <div class="m-2">
                <a href="{{ route('data_laporan_monitoring') }}" class="btn bg-primary text-white m-2 float-right">
                    Kembali</a>
            </div>

            <div class="m-2">
                @foreach ($data_laporan_monitoring as $data_monitoring)
                    <form
                        action="{{ route('StoreLaporanMonitoring', ['id_siswa' => $data_monitoring->siswa->id, 'id_tempat_training' => $data_monitoring->id_tempat_training]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card m-2">
                            <div class="m-2 mt-4">
                                <ul class="text-bold">
                                    <li>Nama Siswa : {{ $data_monitoring->siswa->user->name }} </li>
                                    <li>NISN : {{ $data_monitoring->siswa->nisn }}</li>
                                    <li>Tempat Training :
                                        {{ $data_monitoring->tempatTraining->nama_tempat_training }}
                                    </li>
                                </ul>
                            </div>
                            <div class="m-2">
                                <input type="text" name="bulan" id="bulan" class=" form-control" readonly
                                    value="{{ $data_monitoring->bulan }}">
                            </div>

                            <div class="m-2">
                                <textarea name="laporan_monitoring" id="laporan_monitoring" cols="30" rows="5" class="form-control">
                                    {{ $data_monitoring->laporan_monitoring }}
                                </textarea>
                            </div>

                        </div>

                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
