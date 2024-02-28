@extends('layouts.main')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tempat Magang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <input type="button" onclick="window.location='{{ route('formtempatmagang') }}'" class="btn bgcolor text-white float-right" value="Tambah Data">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white custom-border">
              <div class="inner">
                <div>
                  <img src="{{ asset('dist/img/bg-hotel.png') }}" alt="logo" width="215">
                </div>
                <div class="hotel-info">
                  <ul>
                    <li class="text-bold">Hotel terbaik dibali</li>
                    <li>jl.sunsetroat no 46 kec.kuta</li>
                    <li>Bintang <span class="badge bgcolor text-white">5</span></li>
                    <li>posisi <span class="text-bold">Administrasi</span> </li>
                  </ul>
              
                </div>
                <div class="form-row">
                  <div class="form-group">
                    <a href="{{ route('updatetempatmagang') }}" class="btn custom-border hover-element textcolor">Update</a>
                  </div>

                  <div class="form-group">
                    <a href="" class="btn mx-2 custom-border hover-element textcolor">Delete</a>
                  </div>
                    
                </div>

              </div>
                <a href="{{ route('detailtempatmagang') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection