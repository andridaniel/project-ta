@extends('layouts.main')

@section('konten')

<div class="px-5 p-2">
    <div class="card card-primary">

        <div class="text-bold p-3">
            <a class="kembali" href="{{ route('akunsiswa') }}"> &lt; Kembali</a>
        </div>

        <div>
            <h3 class="text-bold px-3">Detail Akun Siswa</h3>
        </div>
        <!-- form start -->
        <form>

          
              
          <div class="card-body">
            <div class="form-group">
              <label for="namasiswa">Nama Lengkap Siswa</label>
              <p>Andri dartoo</p>
            </div>

            <div class="form-group">
              <label for="nis">No Induk Siswa</label>
              <p>1234567</p>
            </div>

            <div class="form-group">
                <label for="email-siswa">Email</label>
                <p>0fU0j@example.com</p>
            </div>

            <div class="form-group">
                <label for="role-siswa">Role</label>
                <p>Siswa</p>
            </div>

            <div class="form-group">
                <label for="tempattgllahirsiswa">Tempat Tgl Lahir</label>
                <p>Bandung <span>01-01-2000</span></p>

            <div class="form-group">
                <label for="jeniskelamin-siswa">Jenis Kelamin</label>
                <p>Laki-laki</p>
            </div>

            <div class="form-group">
                <label for="Agama-siswa">Agama</label>
                <p>hindu</p>
            </div>

            <div class="form-group">
              <label for="Alamat-siswa">Alamat Rumah</label>
              <p>Jl. Kediri</p>
            </div>

            <div class="form-group">
                <label for="notelphone-siswa">No Telphone</label>
                <p>0987654321</p>
            </div>

            <div class="form-group">
                <label for="namaorangtua-siswa">Nama Orang Tua/Wali</label>
                <p>Andri</p>
            </div>

            <div class="form-group">
                <label for="pekerjaan-orangtua-siswa">Pekerjaan Orang Tua/Wali</label>
                <p>Wiraswasta</p>
            </div>

            <div class="form-group">
                <label for="notelphone-orangtua-siswa">No Telphone Orang Tua</label>
                <p>0987654321</p>
            </div>

            <div class="form-group">
                <label for="kelas-siswa">Kelas</label>
                <p>XII RPL 1</p>
            </div>

            <div class="form-group">
                <label for="exampleInputFile">My Profile</label>
                <img src="" class="img-fluid" alt="Responsive image">
            </div>
         

        </div>
          <!-- /.card-body -->
          
        

        </form>
      </div>
</div>

@endsection