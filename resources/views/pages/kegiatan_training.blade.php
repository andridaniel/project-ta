@extends('layouts.main')

@section('konten')
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
    <div class="card m-2">

        <div class="card-header ">
            <h3 class="text-bold card-title ">Kegiatan Training</h3>
        </div>



        <div class="card m-2 mt-5">
            <div class="card-header bgcolor">
                <h3 class="text-bold card-title text-light">Laporan Mingguan</h3>
            </div>



            @if ($kegiatan_training->isNotEmpty())
                @foreach ($kegiatan_training as $kegiatan)
                    <form
                        action="{{ route('StoreLaporan', ['id_siswa' => $kegiatan->siswa->id, 'id_tempat_training' => $kegiatan->id_tempat_training]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <ul class="m-2 text-bold">
                                <li> Nama Siswa : {{ $kegiatan->siswa->user->name }}</li>
                                <li> Nisn : {{ $kegiatan->siswa->nisn }}</li>
                                <li> Tempat Training : {{ $kegiatan->tempatTraining->nama_tempat_training }}</li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <div class="m-2">
                                <select id="minggu" name="minggu" class="form-control">
                                    <option value="" disabled selected>--Pilih Minggu--</option>
                                    <option value="Minggu 1">Minggu 1</option>
                                    <option value="Minggu 2">Minggu 2</option>
                                    <option value="Minggu 3">Minggu 3</option>
                                    <option value="Minggu 4">Minggu 4</option>
                                    <option value="Minggu 5">Minggu 5</option>
                                    <option value="Minggu 6">Minggu 6</option>
                                    <option value="Minggu 7">Minggu 7</option>
                                    <option value="Minggu 8">Minggu 8</option>
                                    <option value="Minggu 9">Minggu 9</option>
                                    <option value="Minggu 10">Minggu 10</option>
                                    <option value="Minggu 11">Minggu 11</option>
                                    <option value="Minggu 12">Minggu 12</option>
                                </select>
                                @error('minggu')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="m-2">
                                <textarea name="laporan_mingguan" id="laporan_mingguan" cols="20" rows="5" class="form-control"
                                    placeholder="Masukkan Laporan"></textarea>
                                @error('laporan_mingguan')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{-- <input type="hidden" name="status" id="status" class="form-control" value="Diproses"> --}}
                            </div>

                            <div class="m-2 form-row">

                                <div class="m-2 form-group">
                                    <button type="submit" class="btn bg-primary">Kirim</button>
                                </div>

                                <div class="m-2 form-group">
                                    <a href="{{ route('detail_laporan_mingguan', ['id' => $kegiatan->id]) }}"
                                        class="btn bg-danger"> Lihat Laporan Mingguan
                                        >></a>
                                </div>
                            </div>

                        </div>
                    </form>
                @endforeach
            @else
                <div class="m-2">
                    <p class="text-bold">Hasil Interview Anda Belum Ada Yang Diterima</p>
                </div>
            @endif

        </div>



        @if ($kegiatan_laporan_akhir)
            <div class="card m-2 mt-5">
                <div class="card-header bgcolor">
                    <h3 class="text-bold card-title text-light">Laporan Akhir</h3>
                </div>
                <form
                    action="{{ route('TambahLaporanAkhir', ['id_siswa' => $kegiatan_laporan_akhir->siswa->id, 'id_tempat_training' => $kegiatan_laporan_akhir->id_tempat_training]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-2">
                        <input type="file" name="file_laporan_akhir" id="file_laporan_akhir" class="form-control">
                        <input type="hidden" name="status" id="status" class="form-control" value="Diproses" readonly>
                        @error('file_laporan_akhir')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="m-2">
                            <button type="submit" class="btn bg-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        @else
            <div class="card m-2 mt-5">
                <div class="card-header bgcolor">
                    <h3 class="text-bold card-title text-light">Laporan Akhir</h3>
                </div>
                @if ($kegiatan_training->isNotEmpty())
                @else
                    {{-- <form
                        action="{{ route('TambahLaporanAkhir', ['id_siswa' => $siswa->id, 'id_tempat_training' => $tempat_training->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="m-2">
                            <div class="m-2">
                                <input type="file" name="file_laporan_akhir" id="file_laporan_akhir"
                                    class="form-control">
                                @error('file_laporan_akhir')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="status" id="status" class="form-control" value="Diproses"
                                readonly>
                            <div class="m-2">
                                <button type="submit" class="btn bg-primary">Simpan</button>
                            </div>
                        </div>
                    </form> --}}
                    <div class="m-2">
                        <p class="text-bold">Laporan Mingguan Belum di terima</p>
                    </div>
                @endif

            </div>
        @endif




        <div class="card m-2 mt-5">
            @foreach ($laporan_akhir_siswa as $laporan_akhir)
                <div class="card-header bgcolor">
                    <h3 class="text-bold card-title text-light">Hasil Laporan Akhir</h3>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-2 ">

                        <div class="m-2 col-md-8">
                            <a href="{{ asset('dist/laporan_akhir/' . $laporan_akhir->file_laporan_akhir) }}"
                                target="_blank" class="text-primary form-control">
                                {{ $laporan_akhir->file_laporan_akhir }}
                            </a>
                        </div>

                        <div class="m-2 col-md-3">
                            <input type="text" name="status" id="status" value="{{ $laporan_akhir->status }}"
                                class=" @if ($laporan_akhir->status == 'Ditolak') bg-danger @endif @if ($laporan_akhir->status == 'Diproses') bg-info @endif card bg-success btn float-right text-white"
                                readonly>
                        </div>


                    </div>
                    @if ($laporan_akhir->status == 'Ditolak')
                        <!-- Button trigger modal -->
                        <div class="m-4">
                            <button type="button" class="btn btn-secondary" data-toggle="modal"
                                data-target="#exampleModal">
                                Update Data?
                            </button>
                        </div>
                    @endif


                </form>
            @endforeach
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Laporan Akhir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach ($kegiatan_training as $kegiatan)
                        <form
                            action="{{ route('UpdateLaporanAkhir', ['id_siswa' => $kegiatan->siswa->id, 'id_tempat_training' => $kegiatan->id_tempat_training]) }}"
                            method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class=" m-2">
                                <div class="m-2">
                                    <input type="file" name="file_laporan_akhir" id="file_laporan_akhir"
                                        class="form-control">
                                    @error('file_laporan_akhir')
                                        <div>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                            </div>


                        </form>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
