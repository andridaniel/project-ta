@extends('layouts.main')

@section('konten')
    <div class="px-5 p-5 mx-5">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('dashboard') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">My Profile </h3>
            </div>
            <!-- form start -->
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="dist/img/user2-160x160.jpg" width="150" alt="gambar profile"
                            class="img-circle border"><br>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputFile">Upload Foto Profile</label>
                        <input type="file" class="form-control" id="exampleInputFile" name="gambar">
                        @error('gambar')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" required
                            value="{{ auth()->user()->name }}">
                        @error('name')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="Tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="Tempat_lahir" name="Tempat_lahir" value="">
                            @error('Tempat_lahir')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"value="">
                            @error('tgl_lahir')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="jenis_klamin">Jenis Klamin</label>
                        <select name="jenis_klamin" id="jenis_klamin" class="form-control">
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" required value="">
                        @error('agama')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_rumah">Alamat Rumah</label>
                        <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" required
                            value="">
                        @error('alamat_rumah')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>




                    <div class="form-group">
                        <label for="no_hp">Nomor Telepon</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" required
                            value="{{ auth()->user()->no_hp }}">
                        @error('no_telepon')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required
                            value="{{ auth()->user()->email }}">
                        @error('email')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- //profile untuk guru --}}

                    @if (auth()->user()->role_id == '2')
                        {{-- <div class="form-group">
                            <label for="mata_pelajaran">Mata Pelajaran Yang diajarkan</label>
                            <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran"
                                value="">
                            @error('nama_hotel')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label for="wali_kelas">Wali Kelas</label>
                            <select name="wali_kelas" id="wali_kelas" class="form-control">
                                <option value="" disabled selected>Pilih Kelas</option>
                                <option value="Xll-1"> Xll-1</option>
                                <option value="Xll-2"> Xll-2</option>
                            </select>
                            @error('wali_kelas')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif


                    {{-- untuk profile siswa --}}

                    @if (auth()->user()->role_id == '3')
                        <div class="form-group">
                            <label for="nama_orangtua">Nama Orang Tua/Wali</label>
                            <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua"
                                value="">
                            @error('nama_hotel')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_telepon_orangtua">No Telepon Orang Tua/Wali</label>
                            <input type="text" class="form-control" id="no_telepon_orangtua" name="no_telepon_orangtua"
                                value="">
                            @error('nama_hotel')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control">
                                <option value="" disabled selected>Pilih Kelas</option>
                                <option value="Xll-1"> Xll-1</option>
                                <option value="Xll-2"> Xll-2</option>

                            </select>
                            @error('kelas')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif




                </div>
                <!-- /.card-body -->

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
@endsection
