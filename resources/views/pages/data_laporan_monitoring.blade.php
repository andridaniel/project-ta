@extends('layouts.main')

@section('konten')
    <div class="card">
        <div class="card m-2">
            <div class="card-header bgcolor">
                <h3 class="text-bold card-title text-light"> Laporan Monitoring</h3>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($laporanMonitoring->isNotEmpty())
                <div class="m-2">
                    @foreach ($laporanMonitoring as $data_laporan_monitoring)
                        <form
                            action="{{ route('StoreLaporanMonitoring', ['id_siswa' => $data_laporan_monitoring->siswa->id, 'id_tempat_training' => $data_laporan_monitoring->id_tempat_training]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card m-2">
                                <div class="m-2">
                                    <ul class="text-bold">
                                        <li>Nama Siswa : {{ $data_laporan_monitoring->siswa->user->name }} </li>
                                        <li>NISN : {{ $data_laporan_monitoring->siswa->nisn }}</li>
                                        <li>Tempat Training :
                                            {{ $data_laporan_monitoring->tempatTraining->nama_tempat_training }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="m-2">
                                    <select name="bulan" id="bulan" class=" form-control">
                                        <option value="" disabled selected>--pilih Bulan--</option>
                                        <option value="Bulan 1">Bulan 1</option>
                                        <option value="Bulan 2">Bulan 2</option>
                                        <option value="Bulan 3">Bulan 3</option>
                                    </select>
                                    @error('bulan')
                                        <div>
                                            <p class="text-danger">Terjadi kesalahan,{{ $message }}</p>

                                        </div>
                                    @enderror
                                </div>

                                <div class="m-2">
                                    <label for="laporan_monitoring"> Masukkan Laporan</label>
                                    <textarea name="laporan_monitoring" id="laporan_monitoring" cols="30" rows="5" class="form-control">

                                </textarea>
                                    @error('laporan_monitoring')
                                        <div>
                                            <p class="text-danger">Terjadi kesalahan,{{ $message }}</p>

                                        </div>
                                    @enderror
                                </div>

                                <div class="m-2 form-row">

                                    <div class="m-2 form-group">
                                        <button type="submit" class="btn bg-primary">Kirim</button>
                                    </div>

                                    <div class="m-2 form-group">
                                        <a href="{{ route('detail_laporan_monitoring', ['id_siswa' => $data_laporan_monitoring->id_siswa]) }}"
                                            class="btn bg-danger"> Lihat Laporan
                                            >></a>
                                    </div>
                                </div>

                            </div>

                        </form>
                    @endforeach
                @else
                    <div class="m-5 mx-auto">
                        <p class="text-bold">Tidak ada laporan monitoring</p>
                    </div>
            @endif
        </div>
    </div>
    </div>
@endsection
