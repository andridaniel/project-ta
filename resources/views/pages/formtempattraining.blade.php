@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('tempattraining') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Form Tempat Training</h3>
            </div>
            <!-- form start -->
            <form action="{{ route('formtempatraining.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_hotel">Nama Hotel</label>
                        <input type="text" class="form-control" id="nama_hotel" name="nama_hotel"
                            placeholder="Masukan Nama Hotel Disini">
                        @error('nama_hotel')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_hotel">Alamat Hotel</label>
                        <input type="text" class="form-control" id="alamat_hotel" name="alamat_hotel"
                            placeholder="Masukan Alamat Hotel Disini">
                        @error('alamat_hotel')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telepon_hotel">Nomor Telepon Hotel</label>
                        <input type="number" class="form-control" id="telepon_hotel" name="telepon_hotel"
                            placeholder="Masukan Nomor Telepon Hotel Disini">
                        @error('telepon_hotel')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email_hotel">Email Hotel</label>
                        <input type="email" class="form-control" id="email_hotel" name="email_hotel"
                            placeholder="Masukan Alamat Email Hotel Disini">
                        @error('email_hotel')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="lowongan_training">Lowongan Magang</label>
                            <input type="text" class="form-control" id="lowongan_training" name="lowongan_training"
                                placeholder="Masukan Lowongan Magang Disini">
                            @error('lowongan_training')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="jumlah_lowongan_training">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah_lowongan_training"
                                name="jumlah_lowongan_training" placeholder="Jumlah">
                            @error('jumlah_lowongan_training')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="ketentuan_tambahan_training">Ketentuan Tambahan Trainig</label>
                        <textarea name="ketentuan_tambahan_training" id="ketentuan_tambahan_training" cols="30" rows="5"
                            class="form-control"></textarea>
                        @error('ketentuan_tambahan_training')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleInputFile">Upload Foto Hotel</label>
                        <input type="file" class="form-control" id="exampleInputFile" name="gambar">
                        @error('gambar')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="form-row card-footer">
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn custom-border hover-element btn-block">Tambah</button>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn custom-border hover-element btn-block">Batal</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
