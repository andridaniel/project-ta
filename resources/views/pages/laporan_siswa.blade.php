@extends('layouts.main')

@section('konten')
    <div class="card m-2">
        <div class="card-header bgcolor">
            <h3 class="text-bold card-title text-light">Validasi Laporan</h3>
        </div>
        <div class="m-2">
            <div>
                <a href="{{ route('validasi_laporan') }}" class="btn bg-primary text-white m-2 float-right">
                    Kembali</a>
            </div>
            @if ($data_laporan_siswa->isNotEmpty())
                <div class="m-2">
                    <ul class="text-bold">
                        <li> Nama Siswa : {{ $data_laporan_siswa[0]->siswa->user->name }}</li>
                        <li> Nisn : {{ $data_laporan_siswa[0]->siswa->nisn }}</li>
                        <li> Tempat Training : {{ $data_laporan_siswa[0]->tempatTraining->nama_tempat_training }}</li>
                    </ul>
                </div>
            @else
                <div class="m-2 mt-5 mb-5 text-center">
                    <p class="text-bold">Laporan Mingguan Siswa Belum Ada</p>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        </div>


        @foreach ($data_laporan_siswa as $laporan_siswa)
            <form
                action="{{ route('laporan_siswa.validasiLaporanMingguan', ['id_siswa' => $laporan_siswa->siswa->id, 'id_tempat_training' => $laporan_siswa->id_tempat_training, 'id' => $laporan_siswa->id]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card m-2">
                    <div class="m-2">
                        <label for="laporan_siswa">Laporan {{ $laporan_siswa->minggu }}</label>
                        <textarea name="laporan_siswa" id="" cols="30" rows="5" class="form-control" readonly>{{ $laporan_siswa->laporan_mingguan }}</textarea>
                    </div>

                    <div class="m-2">
                        <label for="status"> Keterangan</label>
                        <select name="status" id="satus" class="form-control">
                            <option value="" disabled selected>--pilih keterangan--</option>
                            <option value="Diproses" @if ($laporan_siswa->status == 'Diproses') selected @endif>Diproses
                            </option>
                            <option value="Diterima" @if ($laporan_siswa->status == 'Diterima') selected @endif>Diterima
                            </option>
                            <option value="Ditolak" @if ($laporan_siswa->status == 'Ditolak') selected @endif>Ditolak
                            </option>
                        </select>
                    </div>

                    <div class="m-2">
                        <button type="submit" class="btn bg-primary">Simpan</button>
                    </div>
                </div>

            </form>
        @endforeach


    </div>
@endsection
