@extends('layouts.main')

@section('konten')
    <div class="card m-2">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card card-secondary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                            href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                            aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                            href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                            aria-selected="false">Update Profile</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                        aria-labelledby="custom-tabs-three-home-tab">
                        <div class=" mt-1 ">
                            <div class="card ">

                                <!-- form start -->
                                <form action="{{ route('profilepengguna.updateProfile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <img src="{{ asset('dist/img/' . auth()->user()->gambar_profile) }}"
                                                width="150" alt="gambar profile" class="img-circle border"><br>
                                        </div>

                                        @if (auth()->user()->role_id == '3')
                                            <div class="form-group">
                                                <label for="nisn">Nisn</label>
                                                <input type="number" class="form-control" id="nisn" name="nisn"
                                                    readonly required value="{{ $nisn }}">
                                                @error('nisn')
                                                    <div>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="guru_pembimbing_id">Nama Guru Pembimbing</label>
                                                <input type="text" class="form-control" id="guru_pembimbing_id"
                                                    name="guru_pembimbing_id" readonly required
                                                    value="{{ $nama_guru_pembimbing }}">
                                            </div>
                                        @endif


                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                readonly required value="{{ auth()->user()->name }}">
                                            @error('name')
                                                <div>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    name="tempat_lahir" value="{{ $tempat_lahir }}" readonly>
                                                @error('tempat_lahir')
                                                    <div>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="tgl_lahir">Tgl Lahir</label>
                                                <input type="date" class="form-control" id="tgl_lahir"
                                                    name="tgl_lahir"value="{{ $tgl_lahir }}" readonly>
                                                @error('tgl_lahir')
                                                    <div>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <input type="text" class="form-control" name="jenis_kelamin"
                                                value="{{ $jenis_kelamin }}" readonly>
                                            @error('jenis_kelamin')
                                                <div>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <input type="text" class="form-control" id="agama" name="agama"
                                                value="{{ $agama }}" readonly>
                                            @error('agama')
                                                <div>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat Rumah</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                required value="{{ $alamat }}" readonly>
                                            @error('alamat')
                                                <div>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>




                                        <div class="form-group">
                                            <label for="no_hp">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="no_hp" name="no_hp"
                                                required value="{{ auth()->user()->no_hp }}" readonly>
                                            @error('no_hp')
                                                <div>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required value="{{ auth()->user()->email }}" readonly>
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
                                                <input type="text" name="wali_kelas" class="form-control"
                                                    value="{{ $wali_kelas }}" readonly>
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
                                                <input type="text" class="form-control" id="nama_orangtua"
                                                    name="nama_orangtua" value="{{ $nama_orangtua }}" readonly>
                                                @error('nama_hotel')
                                                    <div>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="no_hp_orangtua">No. HP Orangtua</label>
                                                <input type="number" class="form-control" id="no_hp_orangtua"
                                                    name="no_hp_orangtua"
                                                    value="{{ old('no_hp_orangtua', $no_hp_orangtua) }}" required
                                                    readonly>
                                                @error('no_hp_orangtua')
                                                    <div>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <input type="text" class="form-control" id="kelas" name="kelas"
                                                    value="{{ $kelas }}" readonly>
                                                @error('kelas')
                                                    <div>
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        @endif
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-three-profile-tab">
                        <div class=" mt-1 ">
                            <div class="card ">
                                <div class="card-header bgcolor">
                                    <div class="float-left">
                                        <h3 class="card-title text-bold text-light">Update Data </h3>
                                    </div>

                                    {{-- @if (auth()->user()->role_id == '3')
                                        <div class="form-group float-right">
                                            <h3 class="card-title text-bold text-light" for="guru_pembimbing_id">
                                                Pembimbing
                                                :
                                                <span>{{ $nama_guru_pembimbing }}</span>
                                            </h3>
                                        </div>
                                    @endif --}}
                                </div>

                                <!-- form start -->
                                <form action="{{ route('profilepengguna.updateProfile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <img src="{{ asset('dist/img/' . auth()->user()->gambar_profile) }}"
                                                width="150" alt="gambar profile" class="img-circle border"><br>
                                        </div>

                                        @if (auth()->user()->role_id == '3')
                                            <div class="form-group">
                                                <label for="nisn">Nisn</label>
                                                <input type="number" class="form-control" id="nisn" name="nisn"
                                                    required value="{{ $nisn }}">
                                                @error('nisn')
                                                    <div>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                required value="{{ auth()->user()->name }}">
                                            @error('name')
                                                <div>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    name="tempat_lahir" value="{{ $tempat_lahir }}">
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
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                                required>
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
                                                <option value="hindu"
                                                    {{ old('agama', $agama) == 'hindu' ? 'selected' : '' }}>
                                                    Hindu</option>
                                                <option value="islam"
                                                    {{ old('agama', $agama) == 'islam' ? 'selected' : '' }}>
                                                    Islam</option>
                                                <option value="katolik"
                                                    {{ old('agama', $agama) == 'katolik' ? 'selected' : '' }}>Katolik
                                                </option>
                                                <option value="kristen"
                                                    {{ old('agama', $agama) == 'kristen' ? 'selected' : '' }}>Kristen
                                                </option>
                                                <option value="buddha"
                                                    {{ old('agama', $agama) == 'buddha' ? 'selected' : '' }}>
                                                    Buddha</option>
                                                <option value="konghucu"
                                                    {{ old('agama', $agama) == 'konghucu' ? 'selected' : '' }}>
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
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                required value="{{ $alamat }}">
                                            @error('alamat')
                                                <div>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>




                                        <div class="form-group">
                                            <label for="no_hp">Nomor Telepon</label>
                                            <input type="number" class="form-control" id="no_hp" name="no_hp"
                                                required value="{{ auth()->user()->no_hp }}">
                                            @error('no_hp')
                                                <div>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required value="{{ auth()->user()->email }}">
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
                                                    <option value="XII-A"
                                                        {{ old('wali_kelas', $wali_kelas) == 'XII-A' ? 'selected' : '' }}>
                                                        XII-A</option>
                                                    <option value="XII-B"
                                                        {{ old('wali_kelas', $wali_kelas) == 'XII-B' ? 'selected' : '' }}>
                                                        XII-B</option>
                                                    <option value="XII-C"
                                                        {{ old('wali_kelas', $wali_kelas) == 'XII-C' ? 'selected' : '' }}>
                                                        XII-C</option>
                                                    <option value="XII-D"
                                                        {{ old('wali_kelas', $wali_kelas) == 'XII-D' ? 'selected' : '' }}>
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
                                                <input type="text" class="form-control" id="nama_orangtua"
                                                    name="nama_orangtua" value="{{ $nama_orangtua }}">
                                                @error('nama_hotel')
                                                    <div>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="no_hp_orangtua">No. HP Orangtua</label>
                                                <input type="number" class="form-control" id="no_hp_orangtua"
                                                    name="no_hp_orangtua"
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
                                                    <option value="XII-A"
                                                        {{ old('kelas', $kelas) == 'XII-A' ? 'selected' : '' }}>
                                                        XII-A</option>
                                                    <option value="XII-B"
                                                        {{ old('kelas', $kelas) == 'XII-B' ? 'selected' : '' }}>
                                                        XII-B</option>
                                                    <option value="XII-C"
                                                        {{ old('kelas', $kelas) == 'XII-C' ? 'selected' : '' }}>
                                                        XII-C</option>
                                                    <option value="XII-D"
                                                        {{ old('kelas', $kelas) == 'XII-D' ? 'selected' : '' }}>
                                                        XII-D</option>
                                                </select>
                                                @error('kelas')
                                                    <div>
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="exampleInputFile">Upload Foto Profile <span class="">(jika
                                                    ingin mengganti
                                                    profile)</span></label>
                                            <input type="file" class="form-control" id="exampleInputFile"
                                                name="gambar_profile">
                                            {{-- <img src="{{ asset('dist/img/' . auth()->user()->gambar_profile) }}" width="70"
                                                alt="existing-image" class="my-3"><br> --}}
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
                                            <button type="submit"
                                                class="btn custom-border hover-element btn-block">Simpan</button>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="submit"
                                                class="btn custom-border hover-element btn-block">Batal</button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
