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
                        <img src="{{ asset('dist/img/' . $gambar_profile) }}" width="150" alt="gambar profile"
                            class="img-circle border"><br>
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

                    <div class="form-group">
                        <label for="nisn">Nisn</label>
                        <input type="number" class="form-control" id="nisn" name="nisn" required
                            value="{{ $nisn }}">
                        @error('nisn')
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
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{ $tempat_lahir }}">
                            @error('tempat_lahir')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir"
                                name="tgl_lahir"value="{{ $tgl_lahir }}">
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
                                {{ old('jenis_kelamin', $jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
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
                            <option value="hindu" {{ old('agama', $agama) == 'hindu' ? 'selected' : '' }}>
                                Hindu</option>
                            <option value="islam" {{ old('agama', $agama) == 'islam' ? 'selected' : '' }}>
                                Islam</option>
                            <option value="katolik" {{ old('agama', $agama) == 'katolik' ? 'selected' : '' }}>Katolik
                            </option>
                            <option value="kristen" {{ old('agama', $agama) == 'kristen' ? 'selected' : '' }}>Kristen
                            </option>
                            <option value="buddha" {{ old('agama', $agama) == 'buddha' ? 'selected' : '' }}>
                                Buddha</option>
                            <option value="konghucu" {{ old('agama', $agama) == 'konghucu' ? 'selected' : '' }}>
                                Konghucu</option>
                        </select>
                        @error('agama')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat Rumah</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required
                            value="{{ $alamat }}">
                        @error('alamat')
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
                        <div class="form-group">
                            <label for="wali_kelas">Wali Kelas</label>
                            <select name="wali_kelas" id="wali_kelas" class="form-control" required>
                                <option value="" disabled selected>--Pilih Kelas--</option>
                                <option value="XII-A" {{ old('wali_kelas', $wali_kelas) == 'XII-A' ? 'selected' : '' }}>
                                    XII-A</option>
                                <option value="XII-B" {{ old('wali_kelas', $wali_kelas) == 'XII-B' ? 'selected' : '' }}>
                                    XII-B</option>
                                <option value="XII-C" {{ old('wali_kelas', $wali_kelas) == 'XII-C' ? 'selected' : '' }}>
                                    XII-C</option>
                                <option value="XII-D" {{ old('wali_kelas', $wali_kelas) == 'XII-D' ? 'selected' : '' }}>
                                    XII-D</option>
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
                                value="{{ $nama_orangtua }}">
                            @error('nama_hotel')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp_orangtua">No. HP Orangtua</label>
                            <input type="number" class="form-control" id="no_hp_orangtua" name="no_hp_orangtua"
                                value="{{ old('no_hp_orangtua', $no_hp_orangtua) }}" required>
                            @error('no_hp_orangtua')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control" required>
                                <option value="" disabled selected>--Pilih Kelas--</option>
                                <option value="XII-A" {{ old('kelas', $kelas) == 'XII-A' ? 'selected' : '' }}>
                                    XII-A</option>
                                <option value="XII-B" {{ old('kelas', $kelas) == 'XII-B' ? 'selected' : '' }}>
                                    XII-B</option>
                                <option value="XII-C" {{ old('kelas', $kelas) == 'XII-C' ? 'selected' : '' }}>
                                    XII-C</option>
                                <option value="XII-D" {{ old('kelas', $kelas) == 'XII-D' ? 'selected' : '' }}>
                                    XII-D</option>
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
