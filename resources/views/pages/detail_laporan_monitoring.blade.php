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
                @if ($data_laporan_monitoring->isNotEmpty())
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
                                    <textarea name="laporan_mingguan" id="laporan_mingguan" cols="20" rows="5" class="form-control">{{ $data_monitoring->laporan_monitoring }}</textarea>
                                </div>

                            </div>

                        </form>
                    @endforeach
                @else
                    <div class="m-2 mx-auto">
                        <p class="text-bold">Laporan Monitoring tidak ada </p>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
