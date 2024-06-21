@extends('layouts.main')

@section('konten')
    <div class="card m-2">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header bgcolor">
            <h3 class="text-bold card-title text-light">Validasi Laporan Mingguan</h3>
        </div>

        @if ($hasilLaporan->isNotEmpty())
            <div class="card-body">


                <table class=" table table-bordered p-auto">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Gambar</th>
                            <th>Nisn</th>
                            <th>Nama Lengkap</th>
                            <th>No Hp</th>
                            <th>Tempat Training</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasilLaporan as $key => $hasil_laporan)
                            <tr>
                                <td>{{ $hasilLaporan->firstItem() + $key }}</td>
                                <td class="mx-auto">
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2"
                                            src="{{ asset('dist/img/' . $hasil_laporan->siswa->user->gambar_profile) }}"
                                            alt="User Avatar" width="50px">
                                    </div>
                                </td>
                                <td>{{ $hasil_laporan->siswa->nisn }}</td>
                                <td>{{ $hasil_laporan->siswa->user->name }}</td>
                                <td>{{ $hasil_laporan->siswa->user->no_hp }}</td>
                                <td>{{ $hasil_laporan->tempatTraining->nama_tempat_training }}</td>

                                <td width="20%">
                                    <div class="form-group">
                                        <div class="mt-3">
                                            <a href="{{ route('laporan_siswa', ['id_siswa' => $hasil_laporan->id_siswa]) }}"
                                                class="btn btn-info btn-block"> Lihat Laporan</a>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer clearfix ">
                    <div class="float-right">
                        {{ $hasilLaporan->links('pagination::bootstrap-4') }}
                    </div>

                </div>


            </div>
            {{-- <form action="">
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
            </form> --}}
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
