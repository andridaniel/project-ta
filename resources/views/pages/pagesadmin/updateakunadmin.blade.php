@extends('layouts.main')

@section('konten')

<div class="px-5 p-2">
    <div class="card card-primary">

        <div class="text-bold p-3">
            <a class="kembali" href="{{ route('akunadmin') }}"> &lt; Kembali</a>
        </div>

        <div>
            <h3 class="text-bold px-3">Update Akun Admin</h3>
        </div>
        <!-- form start -->
        <form>

          
              
          <div class="card-body">
            <div class="form-group">
              <label for="namaadmin">Nama Lengkap Admin</label>
              <input type="text" class="form-control" id="namaadmin" placeholder="Masukan Nama Lengkap">
            </div>

            <div class="form-group">
              <label for="nomor-induk-admin">No Induk Admin</label>
              <input type="number" class="form-control" id="nomor-induk-admin" placeholder="Masukan Nomor Induk Guru">
            </div>

            <div class="form-group">
                <label for="email-admin">Email</label>
                <input type="email" class="form-control" id="email-admin" placeholder="Masukan Email">
            </div>

            <div class="form-group">
                <label for="password-admin">Password</label>
                <input type="password" class="form-control" id="password-admin" placeholder="Masukan Password">
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="jeniskelamin-siswa">Role</label>
                    </div>
                    <div class="col-md-12">
                      <select name="role-admin" id="role-admin" class="form-control">
                        <option value="" disabled selected>--Pilih role--</option>
                        <option value="admin">Admin</option>
                        <option value="guru-pembimbing">Guru Pembimbing</option>
                        <option value="siswa">Siswa</option>
                      </select>
                    </div>
                </div>
            
              </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="tempattgllahir-admin">Tempat Tgl Lahir</label>
                    <input type="text" class="form-control" id="tempattgllahir-admin" placeholder="Masukan tempat lahir">
                </div>

                <div class="form-group col-md-4">
                    <label for="tgllahir-admin">Tgl Lahir</label>
                    <input type="date" class="form-control" id="tgllahir-admin" placeholder="Masukan Tgl Lahir">
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="jeniskelamin-admin">Jenis Kelamin</label>
                    </div>
                    <div class="col-md-12">
                        <select name="jeniskelamin-admin" id="jeniskelamin-admin" class="form-control">
                            <option value="" disabled selected>--pilih Jenis Kelamin--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="Agama-admin">Agama</label>
                <input type="text" class="form-control" id="agama-admin" placeholder="Masukkan Agama">
            </div>

            <div class="form-group">
              <label for="Alamat-admin">Alamat Rumah</label>
              <input type="text" class="form-control" id="alamat-admin" placeholder="Masukan Alamat">
            </div>

            <div class="form-group">
                <label for="notelepon-admin">No Telepon</label>
                <input type="number" class="form-control" id="notelepon-admin" placeholder="Masukan No Telepon">
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