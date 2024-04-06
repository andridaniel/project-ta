@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('data_siswa') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Detail Siswa</h3>
            </div>
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('dist/img/' . $data_siswa->gambar_profile) }}" width="150" alt="gambar profile"
                            class="img-circle border"><br>
                    </div>

                    <div class="form-group">
                        <p>Guru Pembimbing : <span>{{ $data_siswa->guru_pembimbing_id }}</span></p>
                        <p>NIS : <span>{{ $data_siswa->nisn }}</span></p>
                        <p>Nama Lengkap: <span>{{ $data_siswa->user->name }}</span></p>
                        <p>No Telepon : <span>{{ $data_siswa->user->no_hp }}</span></p>
                        <p>Email : <span>{{ $data_siswa->user->email }}</span></p>
                        <p>Tempat lahir : <span>{{ $data_siswa->tempat_lahir }}</span></p>
                        <p>Tgl lahir : <span> {{ $data_siswa->tgl_lahir }}</span></p>
                        <p>jenis kelamin : <span>{{ $data_siswa->jenis_kelamin }}</span></p>
                        <p>agama : <span>{{ $data_siswa->agama }}</span></p>
                        <p>alamat : <span>{{ $data_siswa->alamat }}</span></p>
                        <p>kelas : <span>{{ $data_siswa->kelas }}</span></p>
                        <p>orang tua : <span>{{ $data_siswa->nama_orangtua }}</span></p>
                        <p>No Telepon Orang tua : <span>{{ $data_siswa->no_hp_orangtua }}</span></p>

                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
