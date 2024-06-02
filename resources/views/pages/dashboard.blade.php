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
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success text-light ">
                                <div class="inner">
                                    <h3>{{ \App\Models\Guru_pembimbing::count() }}</h3>

                                    <p>Data Guru Pembimbing</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="{{ route('data_guru_pembimbing') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info text-light">
                                <div class="inner">
                                    <h3>{{ \App\Models\Tempat_Training::count() }}<sup style="font-size: 20px"></sup></h3>

                                    <p>Data Tempat Training</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{ route('tempattraining') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="card bg-danger">
                        <div class="mx-auto mt-2">
                            <h3 class="card-title text-bold text-center">
                                SELAMAT DATANG DI SISTEM TEMPAT TRAINING SMK TRIATMA JAYA DALUNG
                            </h3> <br>
                        </div>

                        <div class="px-5 text-center">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam maxime minima debitis at
                                expedita,
                                neque ducimus optio numquam dolorum id aliquid explicabo mollitia suscipit consequuntur
                                blanditiis velit. Tempora, quisquam aperiam!
                            </p>
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
                    <!-- ./col -->
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info text-light">
                            <div class="inner">
                                <h3>{{ \App\Models\Tempat_Training::count() }}<sup style="font-size: 20px"></sup></h3>

                                <p>Data Tempat Training</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('tempattraining') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-success text-light ">
                            <div class="inner">
                                <h3>{{ \App\Models\Guru_pembimbing::count() }}</h3>

                                <p>Data Guru Pembimbing</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('data_guru_pembimbing') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-warning text-light ">
                            <div class="inner">
                                <h3>{{ \App\Models\Siswa::count() }}</h3>

                                <p>Siswa</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('data_siswa') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>

                <div class="card bg-danger">
                    <div class="mx-auto mt-2">
                        <h3 class="card-title text-bold">
                            SELAMAT DATANG DI SISTEM TEMPAT TRAINING SMK TRIATMA JAYA DALUNG
                        </h3> <br>
                    </div>

                    <div class="px-5 text-center">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam maxime minima debitis at expedita,
                            neque ducimus optio numquam dolorum id aliquid explicabo mollitia suscipit consequuntur
                            blanditiis velit. Tempora, quisquam aperiam!
                        </p>
                    </div>





                </div>
            </div>
        </section>

        </div>
    @endif
@endsection
