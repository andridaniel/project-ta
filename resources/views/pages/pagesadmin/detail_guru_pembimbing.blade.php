@extends('layouts.main')

@section('konten')
    <div class=" p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('data_guru_pembimbing') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Detail Guru Pembimbing</h3>
            </div>
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('dist/img/' . $data_guru_pembimbing->user->gambar_profile) }}" width="150"
                            alt="gambar profile" class="img-circle border"><br>
                    </div>

                    <div class="form-group">
                        <p>Nama Lengkap : <span>{{ $data_guru_pembimbing->user->name }}</span></p>
                        <p>No Telepon : <span>{{ $data_guru_pembimbing->user->no_hp }}</span></p>
                        <p>Email : <span>{{ $data_guru_pembimbing->user->email }}</span></p>
                        <p>Tempat lahir : <span>{{ $data_guru_pembimbing->tempat_lahir }}</span></p>
                        <p>Tgl lahir : <span> {{ $data_guru_pembimbing->tgl_lahir }}</span></p>
                        <p>jenis kelamin : <span>{{ $data_guru_pembimbing->jenis_kelamin }}</span></p>
                        <p>agama : <span>{{ $data_guru_pembimbing->agama }}</span></p>
                        <p>alamat : <span>{{ $data_guru_pembimbing->alamat }}</span></p>
                        <p>Wali Kelas : <span>{{ $data_guru_pembimbing->wali_kelas }}</span></p>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
