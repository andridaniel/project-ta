@extends('layouts.main')

@section('konten')

<div class="px-5 p-2">
    <div class="card card-primary">

        <div class="text-bold p-3">
            <a class="kembali" href="{{ route('akunsiswa') }}"> &lt; Kembali</a>
        </div>

        <div>
            <h3 class="text-bold px-3">Form Akun Siswa</h3>
        </div>
        <!-- form start -->
        <form>

          
              
          <div class="card-body">

            <div class="form-group">
              <label for="nis">No Induk Siswa</label>
              <input type="number" class="form-control" id="nis" placeholder="Masukan Nomor Induk Siswa">
            </div>


            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="tempattgllahirsiswa">Tempat Tgl Lahir</label>
                    <input type="text" class="form-control" id="tempattgllahirsiswa" placeholder="Masukan tempat lahir">
                </div>

                <div class="form-group col-md-4">
                    <label for="tgllahirsiswa">Tgl Lahir</label>
                    <input type="date" class="form-control" id="tgllahirsiswa" placeholder="Masukan Tgl Lahir">
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="jeniskelamin-siswa">Jenis Kelamin</label>
                    </div>
                    <div class="col-md-12">
                        <select name="jeniskelamin-siswa" id="jeniskelamin-siswa" class="form-control">
                            <option value="" disabled selected>--pilih Jenis Kelamin--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="Agama-siswa">Agama</label>
                <input type="text" class="form-control" id="agama-siswa" placeholder="Masukkan Agama">
            </div>

            <div class="form-group">
              <label for="Alamat-siswa">Alamat Rumah</label>
              <input type="text" class="form-control" id="alamat-siswa" placeholder="Masukan Alamat">
            </div>

            <div class="form-group">
                <label for="notelphone-siswa">No Telphone</label>
                <input type="number" class="form-control" id="notelphone-siswa" placeholder="Masukan No Telphone">
            </div>

            <div class="form-group">
                <label for="namaorangtua-siswa">Nama Orang Tua/Wali</label>
                <input type="text" class="form-control" id="namaorangtua-siswa" placeholder="Masukan Nama Orang Tua">
            </div>

            <div class="form-group">
                <label for="pekerjaan-orangtua-siswa">Pekerjaan Orang Tua/Wali</label>
                <input type="text" class="form-control" id="pekerjaan-orangtua-siswa" placeholder="Masukan Pekerjaan Orang Tua ">
            </div>

            <div class="form-group">
                <label for="notelphone-orangtua-siswa">No Telphone Orang Tua</label>
                <input type="number" class="form-control" id="notelphone-orangtua-siswa" placeholder="Masukan No Telphone Orang Tua">
            </div>

            <div class="form-group">
                <label for="kelas-siswa">Kelas</label>
                <input type="text" class="form-control" id="kelas-siswa" placeholder="X1 perhotelan 2">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Upload Foto Profile</label>
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