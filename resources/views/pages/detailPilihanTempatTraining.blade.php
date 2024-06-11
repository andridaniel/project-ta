@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('tempattraining') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Detail Tempat Training</h3>
            </div>
            <!-- form start -->
            <form>
                <div class="card-body">

                    <div class="form-group">
                        <img src="{{ asset('dist/img/' . $data_tempat_training->gambar) }}" alt="gambar hotel" width="400">
                    </div>

                    <div class="form-group card-footer">
                        <p>Nama : <span>{{ $data_tempat_training->nama_tempat_training }}</span></p>
                        <p>Alamat : <span>{{ $data_tempat_training->alamat_tempat_training }}</span> </p>
                        <p>No Telepon : <span> {{ $data_tempat_training->telepon_tempat_training }}</span></p>
                        <p>Email : <span> {{ $data_tempat_training->email_tempat_training }}</span></p>
                        <p>Lowongan : <span> {{ $data_tempat_training->lowongan_training }}</span></p>
                        <p>Ketentuan Tambahan : <span> {{ $data_tempat_training->ketentuan_tambahan_training }}</span></p>
                        {{-- <p class="text-bold">Jadwal interview : <span> {{ $data_tempat_training->jadwal_interview }}</span>
                            >> jam
                            : {{ $data_tempat_training->waktu_interview }}</p> --}}
                    </div>


                    {{-- <div class="form-group" style="display: none;">
                        <label for="emailhotel">Ingat Hapus</label>
                        <p>{{ $data_tempat_training->id }}</p>
                    </div>

                    @if (auth()->user()->role_id == '3')
                        <div class="form-group">
                            @if (!$is_siswa_registered)
                                <a href="{{ route('datadiritempattraining', ['id' => $data_tempat_training->id]) }}"
                                    class="btn custom-border hover-element btn-block">Daftar</a>
                            @else
                                <p class="bg-danger p-2">Anda telah terdaftar di tempat training ini.</p>
                            @endif
                        </div>
                    @endif --}}
                </div>
            </form>
        </div>
    </div>
@endsection
