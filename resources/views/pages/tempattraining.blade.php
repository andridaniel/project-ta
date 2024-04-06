@extends('layouts.main')

@section('konten')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row ">

                <div class="card card-success">
                    <div class="card-body">
                        <div class="content-header card-header ">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Pilihan Tempat Training</h1>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>

                        <div class="row mt-2">
                            @foreach ($data_tempat_training as $tempatTraining)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <img src="{{ asset('dist/img/' . $tempatTraining->gambar) }}" class="card-img-top"
                                            alt="gambar training">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>{{ $tempatTraining->nama_hotel }}</strong></h5>
                                            <p class="card-text">
                                                <strong>Alamat:</strong> {{ $tempatTraining->alamat_hotel }} <br>
                                                <strong>Bintang:</strong> {{ $tempatTraining->bintang_hotel }} <br>
                                                <strong>Posisi:</strong> {{ $tempatTraining->lowongan_training }}
                                            </p>

                                            <div class="mt-3">
                                                <a href="{{ route('show', ['id' => $tempatTraining->id]) }}"
                                                    class="btn bgcolor text-white btn-block">More Information</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <!-- Small boxes (Stat box) -->
            <div class="row ">

                <div class="card card-success">
                    <div class="card-body">
                        <div class="content-header card-header ">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Tempat Magang</h1>
                                    </div><!-- /.col -->
                                    <div class="col-sm-6">
                                        <input type="button" onclick="window.location='{{ route('formtempattraining') }}'"
                                            class="btn bgcolor text-white float-right" value="+ Tambah Data">
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>

                        <div class="row mt-2">
                            @foreach ($data_tempat_training as $tempatTraining)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <img src="{{ asset('dist/img/' . $tempatTraining->gambar) }}" class="card-img-top"
                                            alt="gambar training">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>{{ $tempatTraining->nama_hotel }}</strong></h5>
                                            <p class="card-text">
                                                <strong>Alamat:</strong> {{ $tempatTraining->alamat_hotel }} <br>
                                                <strong>Bintang:</strong> {{ $tempatTraining->bintang_hotel }} <br>
                                                <strong>Posisi:</strong> {{ $tempatTraining->lowongan_training }} <br>
                                                <strong>Sisa Lowongan:</strong>
                                                {{ $tempatTraining->jumlah_lowongan_training }}
                                            </p>

                                            <div class=" form-row d-flex  align-items-center mx-auto">
                                                <div class="">
                                                    <a href="{{ route('edit', ['id' => $tempatTraining->id]) }}"
                                                        class="btn btn-warning text-white ">Update</a>
                                                </div>
                                                <div class="mx-2">
                                                    <form action="{{ route('delete', ['id' => $tempatTraining->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger text-white"
                                                            type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <a href="{{ route('show', ['id' => $tempatTraining->id]) }}"
                                                    class="btn bgcolor text-white btn-block">More Information</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
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
