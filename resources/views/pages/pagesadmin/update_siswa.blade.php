@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('data_siswa') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Update Data Siswa</h3>
            </div>

            <!-- form start -->
            <form action="{{ route('update_siswa', $update_siswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="text-center mb-4">
                        <img src="{{ asset('dist/img/' . $update_siswa->gambar_profile) }}" width="150"
                            alt="gambar profile" class="img-circle border"><br>
                    </div>

                    <div class="form-group">
                        <label for="nisn">Nisn</label>
                        <input type="text" class="form-control" id="nisn" name="nisn"
                            value="{{ old('nisn', $update_siswa->nisn) }}" required>
                        @error('nisn')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $update_siswa->User->name) }}" required>
                        @error('name')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $update_siswa->User->email) }}" required>
                        @error('email')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp"
                            value="{{ old('no_hp', $update_siswa->User->no_hp) }}" required>
                        @error('no_hp')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $update_siswa->tempat_lahir) }}" required>
                            @error('tempat_lahir')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                value="{{ old('tgl_lahir', $update_siswa->tgl_lahir) }}" required>
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
                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', $update_siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $update_siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
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
                            <option value="hindu" {{ old('agama', $update_siswa->agama) == 'hindu' ? 'selected' : '' }}>
                                Hindu</option>
                            <option value="islam" {{ old('agama', $update_siswa->agama) == 'islam' ? 'selected' : '' }}>
                                Islam</option>
                            <option value="katolik"
                                {{ old('agama', $update_siswa->agama) == 'katolik' ? 'selected' : '' }}>Katolik
                            </option>
                            <option value="kristen"
                                {{ old('agama', $update_siswa->agama) == 'kristen' ? 'selected' : '' }}>Kristen
                            </option>
                            <option value="buddha"{{ old('agama', $update_siswa->agama) == 'buddha' ? 'selected' : '' }}>
                                Buddha</option>
                            <option
                                value="konghucu"{{ old('agama', $update_siswa->agama) == 'konghucu' ? 'selected' : '' }}>
                                Konghucu</option>
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
                            value="{{ old('alamat', $update_siswa->alamat) }}" required>
                        @error('alamat')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control" required>
                            <option value="" disabled selected>--Pilih Kelas--</option>
                            <option value="XII-A" {{ old('kelas', $update_siswa->kelas) == 'XII-A' ? 'selected' : '' }}>
                                XII-A</option>
                            <option value="XII-B" {{ old('kelas', $update_siswa->kelas) == 'XII-B' ? 'selected' : '' }}>
                                XII-B</option>
                            <option value="XII-C" {{ old('kelas', $update_siswa->kelas) == 'XII-C' ? 'selected' : '' }}>
                                XII-C</option>
                            <option value="XII-D" {{ old('kelas', $update_siswa->kelas) == 'XII-D' ? 'selected' : '' }}>
                                XII-D</option>
                        </select>
                        @error('kelas')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_orangtua">Nama Orangtua</label>
                        <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua"
                            value="{{ old('nama_orangtua', $update_siswa->nama_orangtua) }}" required>
                        @error('alamat')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp_orangtua">No. HP Orangtua</label>
                        <input type="number" class="form-control" id="no_hp_orangtua" name="no_hp_orangtua"
                            value="{{ old('no_hp_orangtua', $update_siswa->no_hp_orangtua) }}" required>
                        @error('no_hp_orangtua')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="exampleInputFile">Upload Foto Profile</label>
                        <input type="file" class="form-control" id="exampleInputFile" name="gambar_profile">
                        <img src="{{ asset('dist/img/' . $update_siswa->gambar_profile) }}" width="70"
                            alt="existing-image" class="my-3"><br>
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
