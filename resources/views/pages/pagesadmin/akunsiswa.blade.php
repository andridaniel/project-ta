@extends('layouts.main')

@section('konten')

<div class="px-5 p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="card-title text-bold"> Akun Siswa</h3>
                    </div>
                    <div class="col-sm-6">
                        <input type="button" onclick="window.location='{{ route('formakunsiswa') }}'" class="btn bgcolor text-white float-right" value="Tambah Data">
                    </div>
                </div>
            </div>
   
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>No Induk Siswa</th>
                  <th>Nama siswa</th>
                  <th>Email</th>
                  <th>Tempat Lahir</th>
                  <th>Tgl Lahir</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td> 12345678</td>
                  <td> budi</td>
                  <td>budi@gmail</td>
                  <td>Jakarta</td>
                  <td>10/10/2000</td>
                  <td>
                    <a href="" class="badge bg-danger"> <i class="nav-icon fas fa-trash px-1"></i>Hapus</a>
                    <a href="{{ route('updateakunsiswa') }}" class="badge bg-warning"><i class="nav-icon fas fa-edit px-1"></i>Update</a>
                    <a href="{{ route('detailakunsiswa') }}" class="badge bg-info"><i class="nav-icon fas fa-info px-1"></i>Detail</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
          </div>
        </div>
        <!-- /.card -->        
      </div>
</div>

@endsection