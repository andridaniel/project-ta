@extends('layouts.main')

@section('konten')

<div class="px-5 p-2">
    <div class="card card-primary">

        <div class="text-bold p-3">
            <a class="kembali" href="{{ route('akunadmin') }}"> &lt; Kembali</a>
        </div>

        <div>
            <h3 class="text-bold px-3">Detail Akun Admin</h3>
        </div>
        <!-- form start -->
        <form>

          
              
          <div class="card-body">
            <div class="form-group">
              <label for="namaadmin">Nama Lengkap Admin</label>
              <p>andri daniel</p>
            </div>

            <div class="form-group">
                <label for="email-admin">Email</label>
                <p>andri@andri</p>
            </div>

            <div class="form-group">
                <label for="tempattgllahir-admin">Tempat Tgl Lahir</label>
                <p>tempat lahir <span>20-10-2000</span></p>

            </div>

            <div class="form-group">
                <label for="jeniskelamin-admin">Jenis Kelamin</label>
                <p>Laki-laki</p>
            </div>

            <div class="form-group">
                <label for="Agama-admin">Agama</label>
                <p>kristen</p>
            </div>

            <div class="form-group">
              <label for="Alamat-admin">Alamat Rumah</label>
              <p>jalan imam bonjol </p>
            </div>

            <div class="form-group">
                <label for="notelepon-admin">No Telepon</label>
                <p>08123456789</p>
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