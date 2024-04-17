@extends('layouts.main')

@section('konten')
    <div class="card mt-5 mx-auto mb-5">
        @if (auth()->user()->role_id == '2')
            <div class="col-md-10 mx-auto mt-5 mb-5">
                <div class="card-header bgcolor">
                    <h3 class="card-title text-white"> <strong>Laporan Akhir Siswa</strong></h3>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($kelompok_bimbingan as $key => $kelompok_bimbingan) --}}
                            <tr>
                                <td> test</td>
                                <td>test</td>
                                <td> test</td>
                                <td> test</td>
                                <td>test</td>
                                <td>
                                    <div class="form-group mx-1">
                                        <a href="" class="badge bg-info">
                                            <i class="nav-icon fas fa-info px-1"></i> Informasi
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        @endif

        {{-- untuk siswa --}}
        @if (auth()->user()->role_id == '3')
            <div class="px-5 p-2">
                <div class="card card-primary">
                    <form action="{{ route('data_laporan_mingguan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- minggu ke 1 --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="laporan_akhir">Laporan Akhir</label>
                                <input type="file" class="form-control" id="laporan_akhir" name="laporan_akhir">
                                <textarea name="keterangan_laporan_akhir" id="keterangan_laporan_akhir" cols="30" rows="5"
                                    class="form-control mt-2" required></textarea>
                                <input type="text" class="form-control mt-2" id="validasi" name="validasi"
                                    placeholder="keterangan">
                                @error('minggu_1')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-row card-footer">
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn custom-border hover-element btn-block">Simpan</button>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn custom-border hover-element btn-block">Batal</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        @endif
        <!-- /.card -->
    </div>
    </div>
@endsection
