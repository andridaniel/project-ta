@extends('layouts.main')

@section('konten')

<div class="px-5 p-2">
    <div class="card card-primary">

        <div class="text-bold p-3">
            <a class="kembali" href="{{ route('tempatmagang') }}"> &lt; Kembali</a>
        </div>

        <div>
            <h3 class="text-bold px-3">Form Tempat Magang</h3>
        </div>
        <!-- form start -->
        <form>
          <div class="card-body">
            <div class="form-group">
              <label for="namahotel">Nama Hotel</label>
              <input type="text" class="form-control" id="namahotel" placeholder="Masukan Nama Hotel Disini">
            </div>

            <div class="form-group">
              <label for="alamathotel">Alamat Hotel</label>
              <input type="text" class="form-control" id="alamathotel" placeholder="Masukan Alamat Hotel Disini">
            </div>

            <div class="form-group">
              <label for="teleponhotel">Nomor Telepon Hotel</label>
              <input type="number" class="form-control" id="teleponhotel" placeholder="Masukan Nomor Telepon Hotel Disini">
            </div>

            <div class="form-group">
              <label for="emailhotel">Email Hotel</label>
              <input type="email" class="form-control" id="emailhotel" placeholder="Masukan Alamat Email Hotel Disini">
            </div>

            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="lowonganmagang">Lowongan Magang</label>
                    <input type="text" class="form-control" id="lowonganmagang" placeholder="Masukan Lowongan Magang Disini">
                </div>
                <div class="form-group col-md-2">
                    <label for="jumlahlowonganmagang">Jumlah</label>
                    <input type="number" class="form-control" id="jumlahlowonganmagang" placeholder="Jumlah">
                </div>
            </div>

            <div class="form-group">
              <label for="infolowongan">Informasi Lowongan</label>
              <input type="text" class="form-control" id="infolowongan" placeholder="Masukan Informasi Detail Mengenai Lowongan">
            </div>

            <div class="form-group">
              <label for="prosedurpendaftaran">Prosedur Pendaftaran</label>
              <input type="text" class="form-control" id="prosedurpendaftaran" placeholder="Masukan Prosedur Pendaftaran Hotel Disini">
            </div>


            <div class="form-group">
              <label for="exampleInputFile">Upload Foto Hotel</label>
               <div class="input-group">
                  <div class="form-group ">
                    <input type="file" name="gambar[]" id="gambar" multiple><br>
                  </div>
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