@extends('layouts.main')

@section('konten')

<div class="px-5 p-2">
    <div class="card card-primary">

        <div class="text-bold p-3">
            <a class="kembali" href="{{ route('akunguru') }}"> &lt; Kembali</a>
        </div>

        <div>
            <h3 class="text-bold px-3">Detail Akun Guru Pembimbing</h3>
        </div>
        <!-- form start -->
        <form>

          
              
          <div class="card-body">
            <div class="form-group">
              <label for="namaguru">Nama Lengkap Guru</label>
              <p>andri daniel</p>
            </div>

            <div class="form-group">
              <label for="nomor-induk-guru">No Induk Guru</label>
              <p>12345678</p>
            </div>

            <div class="form-group">
                <label for="email-guru">Email</label>
                <p>andri@andri</p>
            </div>

            <div class="form-group">
                <label for="password-guru">Password</label>
                <p>12345678</p>
            </div>

            <div class="form-group">
                <label for="role-guru">Role</label>
                <p>guru-pembimbing</p>
            </div>

            <div class="form-group">
                <label for="tempattgllahir-guru">Tempat Tgl Lahir</label>
                <p>Kediri <span>01-01-2000</span></p>
            </div>

            <div class="form-group">
                <label for="jeniskelamin-guru">Jenis Kelamin</label>
                <p>laki-laki</p>
            </div>

            <div class="form-group">
                <label for="Agama-guru">Agama</label>
                <p>kristen</p>
            </div>

            <div class="form-group">
              <label for="Alamat-guru">Alamat Rumah</label>
              <p>Jl. Kediri No. 1, Kediri, Indonesia</p>
            </div>

            <div class="form-group">
                <label for="notelepon-guru">No Telepon</label>
                <p>081234567890</p>
            </div>

            <div class="form-group">
                <label for="mata-pelajaran-yang-diajarkan">Mata pelajaran yang diajarkan</label>
                <p>Matematika</p>
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