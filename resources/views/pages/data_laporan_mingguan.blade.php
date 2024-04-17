@extends('layouts.main')

@section('konten')
    <div class="card mt-5 mx-auto mb-5">
        @if (auth()->user()->role_id == '2')
            <div class="col-md-10 mx-auto mt-5 mb-5">
                <div class="card-header bgcolor">
                    <h3 class="card-title text-white"> <strong>Laporan Mingguan Siswa</strong></h3>
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
        <!-- /.card -->

        {{-- untuk siswa --}}
        @if (auth()->user()->role_id == '3')
            <div class="px-5 p-2">
                <div class="card card-primary">
                    <!-- form start -->
                    <form action="{{ route('data_laporan_mingguan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- minggu ke 1 --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="minggu_1">Laporan Minggu ke-1</label>
                                <textarea name="minggu_1" id="minggu_1" cols="30" rows="5" class="form-control" required></textarea>
                                <input type="text" class="form-control mt-2" id="validasi" name="validasi"
                                    placeholder="Keterangan">
                                @error('minggu_1')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- minggu ke 2 --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="minggu_2">Laporan Minggu ke-2</label>
                                <textarea name="minggu_2" id="minggu_2" cols="30" rows="5" class="form-control" required></textarea>
                                <input type="text" class="form-control mt-2" id="validasi" name="validasi"
                                    placeholder="Keterangan">
                                @error('minggu_2')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- minggu ke 3 --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="minggu_3">Laporan Minggu ke-3</label>
                                <textarea name="minggu_3" id="minggu_3" cols="30" rows="5" class="form-control" required></textarea>
                                <input type="text" class="form-control mt-2" id="validasi" name="validasi"
                                    placeholder="Keterangan">
                                @error('minggu_3')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- minggu ke 4 --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="minggu_4">Laporan Minggu ke-4</label>
                                <textarea name="minggu_4" id="minggu_4" cols="30" rows="5" class="form-control" required></textarea>
                                <input type="text" class="form-control mt-2" id="validasi" name="validasi"
                                    placeholder="Keterangan">
                                @error('minggu_4')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- minggu ke 5 --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="minggu_3">Laporan Minggu ke-5</label>
                                <textarea name="minggu_5" id="minggu_5" cols="30" rows="5" class="form-control" required></textarea>
                                <input type="text" class="form-control mt-2" id="validasi" name="validasi"
                                    placeholder="Keterangan">
                                @error('minggu_5')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- minggu ke 6 --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="minggu_3">Laporan Minggu ke-6</label>
                                <textarea name="minggu_6" id="minggu_6" cols="30" rows="5" class="form-control" required></textarea>
                                <input type="text" class="form-control mt-2" id="validasi" name="validasi"
                                    placeholder="Keterangan">
                                @error('minggu_6')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- minggu ke 7 --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="minggu_7">Laporan Minggu ke-7</label>
                                <textarea name="minggu_7" id="minggu_7" cols="30" rows="5" class="form-control" required></textarea>
                                <input type="text" class="form-control mt-2" id="validasi" name="validasi"
                                    placeholder="Keterangan">
                                @error('minggu_7')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        {{-- minggu ke 8 --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="minggu_8">Laporan Minggu ke-8</label>
                                <textarea name="minggu_8" id="minggu_8" cols="30" rows="5" class="form-control" required></textarea>
                                <input type="text" class="form-control mt-2" id="validasi" name="validasi"
                                    placeholder="Keterangan">
                                @error('minggu_8')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- minggu ke 9 --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="minggu_8">Laporan Minggu ke-9</label>
                                <textarea name="minggu_9" id="minggu_9" cols="30" rows="5" class="form-control" required></textarea>
                                <input type="text" class="form-control mt-2" id="validasi" name="validasi"
                                    placeholder="Keterangan">
                                @error('minggu_9')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row card-footer">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn custom-border hover-element btn-block">Simpan</button>
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn custom-border hover-element btn-block">Batal</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        @endif
    </div>
    </div>
@endsection
