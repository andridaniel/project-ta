@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('data_guru_pembimbing') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Update Data Guru Pembimbing</h3>
            </div>

            <!-- form start -->
            <form action="{{ route('update_guru_pembimbing', $update_guru_pembimbing->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="text-center mb-4">
                        <img src="{{ asset('dist/img/' . $update_guru_pembimbing->user->gambar_profile) }}" width="150"
                            alt="gambar profile" class="img-circle border"><br>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $update_guru_pembimbing->User->name) }}" required>
                        @error('name')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $update_guru_pembimbing->User->email) }}" required>
                        @error('email')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp"
                            value="{{ old('no_hp', $update_guru_pembimbing->User->no_hp) }}" required>
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
                                value="{{ old('tempat_lahir', $update_guru_pembimbing->tempat_lahir) }}" required>
                            @error('tempat_lahir')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tgl_lahir">Tgl Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                value="{{ old('tgl_lahir', $update_guru_pembimbing->tgl_lahir) }}" required>
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
                                {{ old('jenis_kelamin', $update_guru_pembimbing->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $update_guru_pembimbing->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
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
                            <option value="hindu"
                                {{ old('agama', $update_guru_pembimbing->agama) == 'hindu' ? 'selected' : '' }}>
                                Hindu</option>
                            <option value="islam"
                                {{ old('agama', $update_guru_pembimbing->agama) == 'islam' ? 'selected' : '' }}>
                                Islam</option>
                            <option value="katolik"
                                {{ old('agama', $update_guru_pembimbing->agama) == 'katolik' ? 'selected' : '' }}>Katolik
                            </option>
                            <option value="kristen"
                                {{ old('agama', $update_guru_pembimbing->agama) == 'kristen' ? 'selected' : '' }}>Kristen
                            </option>
                            <option
                                value="buddha"{{ old('agama', $update_guru_pembimbing->agama) == 'buddha' ? 'selected' : '' }}>
                                Buddha</option>
                            <option
                                value="konghucu"{{ old('agama', $update_guru_pembimbing->agama) == 'konghucu' ? 'selected' : '' }}>
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
                            value="{{ old('alamat', $update_guru_pembimbing->alamat) }}" required>
                        @error('alamat')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="wali_kelas">Wali Kelas</label>
                        <select name="wali_kelas" id="wali_kelas" class="form-control" required>
                            <option value="" disabled selected>--Pilih Kelas--</option>
                            <option value="XII-A"
                                {{ old('wali_kelas', $update_guru_pembimbing->wali_kelas) == 'XII-A' ? 'selected' : '' }}>
                                XII-A</option>
                            <option value="XII-B"
                                {{ old('wali_kelas', $update_guru_pembimbing->wali_kelas) == 'XII-B' ? 'selected' : '' }}>
                                XII-B</option>
                            <option value="XII-C"
                                {{ old('wali_kelas', $update_guru_pembimbing->wali_kelas) == 'XII-C' ? 'selected' : '' }}>
                                XII-C</option>
                            <option value="XII-D"
                                {{ old('wali_kelas', $update_guru_pembimbing->wali_kelas) == 'XII-D' ? 'selected' : '' }}>
                                XII-D</option>
                        </select>
                        @error('wali_kelas')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Upload Foto Profile</label>
                        <input type="file" class="form-control" id="exampleInputFile" name="gambar_profile">
                        <img src="{{ asset('dist/img/' . $update_guru_pembimbing->user->gambar_profile) }}" width="70"
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
