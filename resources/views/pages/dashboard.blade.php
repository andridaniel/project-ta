@extends('layouts.main')

@section('konten')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
                {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col --> --}}
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (auth()->user()->role_id == '3')
        <div>
            <div class="container-fluid">
                <div class="form-group card bgcolor">
                    <h4 class="mx-auto p-5 text-white">Selamat Datang Buat Siswa Yang Siap Melakukan Training</h4>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bgcolor text-light">
                                <div class="inner">
                                    <h3>{{ $jumlah_siswa }}<sup style="font-size: 20px"></sup></h3>

                                    <p>Siswa Bimbingan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person" style="color: rgb(188, 186, 186);"></i>
                                </div>
                                <a href="{{ route('kelompok_bimbingan') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bgcolor text-light">
                                <div class="inner">
                                    <h3>{{ \App\Models\Tempat_Training::count() }}<sup style="font-size: 20px"></sup></h3>

                                    <p>Tempat Training</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars" style="color: rgb(188, 186, 186);"></i>
                                </div>
                                <a href="{{ route('tempattraining') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    @endif
    <!-- Main content -->
    @if (in_array(auth()->user()->role_id, ['1', '2']))
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bgcolor text-light">
                            <div class="inner">
                                <h3>{{ \App\Models\Siswa::count() }}</h3>

                                <p>Siswa</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person" style="color: rgb(188, 186, 186);"></i>
                            </div>
                            <a href="{{ route('data_siswa') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bgcolor text-light">
                            <div class="inner">
                                <h3>{{ \App\Models\Tempat_Training::count() }}<sup style="font-size: 20px"></sup></h3>

                                <p>Tempat Training</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars" style="color: rgb(188, 186, 186);"></i>
                            </div>
                            <a href="{{ route('tempattraining') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box bgcolor text-light ">
                            <div class="inner">
                                <h3>{{ \App\Models\Guru_pembimbing::count() }}</h3>

                                <p>Guru Pembimbing</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person" style="color: rgb(188, 186, 186);"></i>
                            </div>
                            <a href="{{ route('data_guru_pembimbing') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        </div>
    @endif
@endsection
