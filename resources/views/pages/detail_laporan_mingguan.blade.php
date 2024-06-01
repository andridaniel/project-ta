@extends('layouts.main')

@section('konten')
    <div class="form-group card m-2">

        @if ($laporan_mingguan_siswa->isNotEmpty())
            <div class="m-2">
                <div>
                    <a href="{{ route('kegiatan_training') }}" class="btn bg-primary text-white float-right m-2"> Kembali</a>
                </div>

                <div class="m-2">
                    <ul class="text-bold">
                        <li> Nama Siswa : {{ $laporan_mingguan_siswa[0]->siswa->user->name }}</li>
                        <li> Nisn : {{ $laporan_mingguan_siswa[0]->siswa->nisn }}</li>
                        <li> Tempat Training : {{ $laporan_mingguan_siswa[0]->tempatTraining->nama_tempat_training }}</li>
                    </ul>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            @foreach ($laporan_mingguan_siswa as $laporan_mingguan_siswas)
                <form
                    action="{{ route('detail_laporan_mingguan.UpdateLaporanMingguan', ['id_siswa' => $laporan_mingguan_siswas->siswa->id, 'id_tempat_training' => $laporan_mingguan_siswas->id_tempat_training, 'id' => $laporan_mingguan_siswas->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card m-2">
                        <div class="card-header bgcolor">
                            <h3 class="card-title text-bold text-light">Laporan {{ $laporan_mingguan_siswas->minggu }}</h3>
                        </div>

                        <div class="mx-4 mt-2 ">
                            <input type="text" name="status" id="status"
                                value="{{ $laporan_mingguan_siswas->status }}"
                                class=" @if ($laporan_mingguan_siswas->status == 'Ditolak') bg-danger @endif @if ($laporan_mingguan_siswas->status == 'Diproses') bg-info @endif card bg-success btn  text-white"
                                readonly>
                        </div>

                        <div class="mx-4 mb-2 ">
                            <textarea name="laporan_mingguan" id="laporan_mingguan" cols="20" rows="5" class="form-control">{{ $laporan_mingguan_siswas->laporan_mingguan }}</textarea>
                        </div>
                        <div class="m-2">
                            <button type="submit" class="btn bgcolor text-white float-right mx-3">Update Data</button>
                        </div>
                    </div>


                </form>
            @endforeach
        @else
            <div class="m-2">
                <p class="text-bold">Tidak ada laporan mingguan</p>
            </div>
        @endif
    </div>
@endsection
