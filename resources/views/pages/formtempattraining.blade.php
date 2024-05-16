@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('tempattraining') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Form Tambah Tempat Training</h3>
            </div>
            <!-- form start -->
            <form action="{{ route('formtempatraining.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_tempat_training">Nama Tempat Training</label>
                        <input type="text" class="form-control" id="nama_tempat_training" name="nama_tempat_training"
                            placeholder="Masukan Nama Tempat Training" required>
                        @error('nama_tempat_training')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_tempat_training">Alamat Tempat Training</label>
                        <input type="text" class="form-control" id="alamat_tempat_training" name="alamat_tempat_training"
                            placeholder="Masukan Alamat Tempat Training" required>
                        @error('alamat_tempat_training')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telepon_tempat_training">Nomor Telepon Tempat Training</label>
                        <input type="number" class="form-control" id="telepon_tempat_training"
                            name="telepon_tempat_training" placeholder="Masukan Nomor Telepon Tempat Training" required>
                        @error('telepon_tempat_training')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email_tempat_training">Email Tempat Training</label>
                        <input type="email" class="form-control" id="email_tempat_training" name="email_tempat_training"
                            placeholder="Masukan Alamat Email Tempat Training" required>
                        @error('email_tempat_training')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="lowongan_training">Lowongan Tempat Training</label>
                            <input type="text" class="form-control" id="lowongan_training" name="lowongan_training"
                                placeholder="Masukan Lowongan Training" required>
                            @error('lowongan_training')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="jumlah_lowongan_training">Jumlah Lowongan</label>
                            <input type="number" class="form-control" id="jumlah_lowongan_training"
                                name="jumlah_lowongan_training" placeholder="Jumlah" required>
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
                            class="form-control" required></textarea>
                        @error('ketentuan_tambahan_training')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleInputFile">Upload Foto Tempat Training</label>
                        <input type="file" class="form-control" id="exampleInputFile" name="gambar">
                        @error('gambar')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row card-footer">
                        <div class="form-group col-md-10">
                            <label for="jadwal_interview">Jadwal Interview</label>
                            <input type="date" class="form-control" id="jadwal_interview" name="jadwal_interview"
                                required>
                            @error('jadwal_interview')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="waktu_interview">Waktu</label>
                            <input type="time" class="form-control" id="waktu_interview" name="waktu_interview" required>
                            @error('waktu_interview')
                                <div>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
