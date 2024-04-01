@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('data_admin') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Form Tambah Data Admin</h3>
            </div>

            <!-- form start -->
            <form action="{{ route('tambah_data_admin.store', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                placeholder="Masukan Tempat Lahir" required>
                            @error('tempat_lahir')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                placeholder="tgl lahir" required>
                            @error('tgl_lahir')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="" disabled selected>--Pilih Jenis Kelamin--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control" required>
                            <option value="" disabled selected>--Pilih Agama--</option>
                            <option value="hindu">hindu</option>
                            <option value="islam">islam</option>
                            <option value="katolik">katolik</option>
                            <option value="kristen">kristen</option>
                            <option value="buddha">buddha</option>
                            <option value="konghucu">konghucu</option>
                        </select>
                        @error('agama')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            placeholder="Masukan Alamat Disini" required>
                        @error('alamat')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Upload Foto Profile</label>
                        <input type="file" class="form-control" id="exampleInputFile" name="gambar_profile">
                        @error('gambar_profile')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="form-row card-footer">
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn custom-border hover-element btn-block">Tambah</button>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn custom-border hover-element btn-block">Batal</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
