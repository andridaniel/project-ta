@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('tempattraining') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Detail Tempat Magang</h3>
            </div>
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <img src="{{ asset('dist/img/' . $data_tempat_training->gambar) }}" alt="gambar hotel" width="400">
                    </div>

                    <div class="form-group">
                        <h5 class="text-bold">{{ $data_tempat_training->nama_hotel }}</h5>
                        <p>{{ $data_tempat_training->alamat_hotel }}</p>
                        <p>No Telepon : <span> {{ $data_tempat_training->telepon_hotel }}</span></p>
                        <p>Email : <span> {{ $data_tempat_training->email_hotel }}</span></p>
                        <p>Bintang : <span> {{ $data_tempat_training->bintang_hotel }}</span></p>
                        <p>Lowongan : <span> {{ $data_tempat_training->lowongan_training }}</span></p>
                    </div>



                    <div class="form-group">
                        <label for="emailhotel">Jumlah Lowongan Training</label>
                        <p>{{ $data_tempat_training->jumlah_lowongan_training }}</p>
                    </div>

                    <div class="form-group">
                        <label for="emailhotel">Ketentuan Tambahan</label>
                        <p>{{ $data_tempat_training->ketentuan_tambahan_training }}</p>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('datadiritempattraining') }}"
                            class="btn custom-border hover-element btn-block">Daftar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
