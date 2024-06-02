@extends('layouts.main')

@section('konten')
    <div class=" p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('data_siswa_bimbingan') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Data Siswa Bimbingan</h3>
            </div>

            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="text-center mb-4">
                        <img src="{{ asset('dist/img/' . $siswa_bimbingan->user->gambar_profile) }}" width="150"
                            alt="gambar profile" class="img-circle border"><br>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="guru_pembimbing_id"> Guru Pembimbing:</label>
                            <input type="text" class="form-control" id="guru_pembimbing_id" name="guru_pembimbing_id"
                                value="{{ old('guru_pembimbing_id', $siswa_bimbingan->hasGuruPembimbing->user->name) }}"
                                required readonly>

                            @error('guru_pembimbing_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="nisn">Nisn</label>
                            <input type="text" class="form-control" id="nisn" name="nisn"
                                value="{{ old('nisn', $siswa_bimbingan->nisn) }}" readonly required>
                            @error('nisn')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $siswa_bimbingan->user->name) }}" readonly required>
                            @error('name')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $siswa_bimbingan->user->email) }}" readonly required>
                            @error('email')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp"
                                value="{{ old('no_hp', $siswa_bimbingan->user->no_hp) }}" readonly required>
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
                                    value="{{ old('tempat_lahir', $siswa_bimbingan->tempat_lahir) }}" readonly required>
                                @error('tempat_lahir')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tgl_lahir">Tgl Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                    value="{{ old('tgl_lahir', $siswa_bimbingan->tgl_lahir) }}" readonly required>
                                @error('tgl_lahir')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                value="{{ old('jenis_kelamin', $siswa_bimbingan->jenis_kelamin) }}" readonly>
                            @error('jenis_kelamin')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" name="agama" id="agama"
                                value="{{ old('agama', $siswa_bimbingan->agama) }}" readonly>
                            @error('agama')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ old('alamat', $siswa_bimbingan->alamat) }}" required readonly>
                            @error('alamat')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="kelas"
                                value="{{ old('kelas', $siswa_bimbingan->kelas) }}" readonly>
                            @error('kelas')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama_orangtua">Nama Orangtua</label>
                            <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua"
                                value="{{ old('nama_orangtua', $siswa_bimbingan->nama_orangtua) }}" required readonly>
                            @error('alamat')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp_orangtua">No. HP Orangtua</label>
                            <input type="number" class="form-control" id="no_hp_orangtua" name="no_hp_orangtua"
                                value="{{ old('no_hp_orangtua', $siswa_bimbingan->no_hp_orangtua) }}" required readonly>
                            @error('no_hp_orangtua')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        {{-- <div class="form-group">
                            <label for="exampleInputFile">Upload Foto Profile</label>
                            <input type="file" class="form-control" id="exampleInputFile" name="gambar_profile">
                            <img src="{{ asset('dist/img/' . $siswa_bimbingan->user->gambar_profile) }}" width="70"
                                alt="existing-image" class="my-3"><br>
                            @error('gambar_profile')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}


                    </div>
                    <!-- /.card-body -->
                </div>
            </form>
        </div>
    </div>
@endsection
