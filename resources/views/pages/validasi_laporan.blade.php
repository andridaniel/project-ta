@extends('layouts.main')

@section('konten')
    <div class="card m-2">
        <div class="card-header bgcolor">
            <h3 class="text-bold card-title text-light">Validasi Laporan Mingguan</h3>
        </div>

        @if ($hasilLaporan->isNotEmpty())
            <form action="">

                @csrf
                <div class="row mt-3">
                    @foreach ($hasilLaporan as $hasil_laporan)
                        <div class="col-md-4">
                            <div class="card card-widget m-2">
                                <div class="widget-user-image m-2 mx-auto">
                                    <img class="img-circle elevation-2 m-2 "
                                        src="{{ asset('dist/img/' . $hasil_laporan->siswa->user->gambar_profile) }}"
                                        alt="User Avatar" width="100">
                                </div>
                                <div class="m-2">
                                    <ul class="text-bold mt-2">
                                        <li>nama siswa : {{ $hasil_laporan->siswa->user->name }}</li>
                                        <li>Nisn : {{ $hasil_laporan->siswa->nisn }}</li>
                                        <li>tempat training : {{ $hasil_laporan->tempatTraining->nama_tempat_training }}
                                        </li>
                                    </ul>
                                </div>

                                <div class="m-4">
                                    <a href="{{ route('laporan_siswa', ['id_siswa' => $hasil_laporan->id_siswa]) }}"
                                        class="btn btn-primary btn-block"> Lihat Laporan</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        @else
            <div class="m-2 mx-auto">
                <p class="text-bold ">Tidak ada data laporan mingguan siswa</p>
            </div>
        @endif

    </div>

    <div class="card m-2 mt-5">
        <div class="card-header bgcolor">
            <h3 class="text-bold card-title text-light">Validasi Laporan Akhir</h3>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($hasilLaporanAkhir->isNotEmpty())
            @foreach ($hasilLaporanAkhir as $hasil_laporan_akhir)
                <form
                    action="{{ route('validasi_laporan.validasiLaporanAkhir', ['id_siswa' => $hasil_laporan_akhir->siswa->id, 'id_tempat_training' => $hasil_laporan_akhir->id_tempat_training, 'id' => $hasil_laporan_akhir->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class=" card m-2">
                        <div class="mt-2">
                            <ul class="text-bold">
                                <li>Nama Siswa : {{ $hasil_laporan_akhir->siswa->user->name }}</li>
                                <li>NISN : {{ $hasil_laporan_akhir->siswa->nisn }}</li>
                                <li>Tempat Training : {{ $hasil_laporan_akhir->tempatTraining->nama_tempat_training }}</li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="m-2 col-md-8">
                                <a href="{{ asset('dist/laporan_akhir/' . $hasil_laporan_akhir->file_laporan_akhir) }}"
                                    target="_blank" class="text-primary form-control" name="file_laporan_akhir"
                                    id="file_laporan_akhir">
                                    {{ $hasil_laporan_akhir->file_laporan_akhir }}
                                </a>
                            </div>

                            <div class="m-2 col-md-3">
                                <select name="status" id="satus" class="form-control">
                                    <option value="" disabled selected>--pilih keterangan--</option>
                                    <option value="Diproses" @if ($hasil_laporan_akhir->status == 'Diproses') selected @endif>Diproses
                                    </option>
                                    <option value="Diterima" @if ($hasil_laporan_akhir->status == 'Diterima') selected @endif>Diterima
                                    </option>
                                    <option value="Ditolak" @if ($hasil_laporan_akhir->status == 'Ditolak') selected @endif>Ditolak
                                    </option>
                                </select>
                            </div>
                            <div class="m-3">
                                <button class="btn bg-primary">Simpan</button>
                            </div>
                        </div>
                    </div>

                </form>
            @endforeach
        @else
            <div class="m-2 mx-auto">
                <p class="text-bold ">Tidak ada data laporan akhir siswa,
                </p>
            </div>
        @endif

    </div>

@endsection
