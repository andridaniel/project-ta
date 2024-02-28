@extends('layouts.main')

@section('konten')

<div class="px-5 p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="card-title text-bold"> Akun Guru</h3>
                    </div>
                    <div class="col-sm-6">
                        <input type="button" onclick="window.location='{{ route('formakunguru') }}'" class="btn bgcolor text-white float-right" value="Tambah Data">
                    </div>
                </div>
            </div>
   
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>No Induk Guru</th>
                  <th>Nama Guru</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Role</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td> 12345678</td>
                  <td><span class="badge bg-danger">55%</span></td>
                  <td><span>Password</span></td>
                  <td><span>Role</span></td>
                  <td>
                    <a href="" class="badge bg-danger">Hapus</a>
                    <a href="{{ route('updateakunguru') }}" class="badge bg-warning">Update</a>
                    <a href="{{ route('detailakunguru') }}" class="badge bg-info">Detail</a>
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