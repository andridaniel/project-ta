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
                    <input type="button" onclick="window.location='{{ route('formtempattraining') }}'"
                        class="btn bgcolor text-white float-right" value="Tambah Data">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row ">
                @foreach ($data_tempat_training as $tempatTraining)
                    <div class="col-lg-3 col-md-6">
                        <!-- small box -->
                        <div class="col-md-12 bg-white custom-border">
                            <div class="inner card mx-auto mt-2">

                                <div class="hotel-info">
                                    <div class="img mx-auto">
                                        <img src="{{ asset('dist/img/' . $tempatTraining->gambar) }}" alt="gambar training">
                                    </div>
                                    <ul>
                                        <li class="text-bold">{{ $tempatTraining->nama_hotel }}</li>
                                        <li class="text-bold">{{ $tempatTraining->alamat_hotel }}</li>
                                        <li class="text-bold">Bintang <span class="badge bgcolor text-white">5</span></li>
                                        <li class="text-bold">Posisi <span>{{ $tempatTraining->lowongan_training }}</span>
                                        </li>
                                    </ul>
                                    <div class="form-row mx-auto ">
                                        <div class="form-group">
                                            <a href="{{ route('updatetempatmagang') }}"
                                                class="btn custom-border hover-element textcolor">Update</a>
                                        </div>

                                        <div class="form-group">
                                            <form action="{{ route('delete', ['id' => $tempatTraining->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn mx-2 custom-border hover-element textcolor"
                                                    type="submit">
                                                    <i class="nav-icon fas fa-trash-alt mr-3"></i>Delete</button>
                                            </form>

                                        </div>

                                    </div>
                                </div>


                            </div>
                            <a href="{{ route('detailtempattraining') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endforeach
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
