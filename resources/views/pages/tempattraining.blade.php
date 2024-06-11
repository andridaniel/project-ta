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

            @if (auth()->user()->role_id == '3')
                <div class="row">

                    <div class="card col-md-12">
                        <div class="card-body">
                            <div class="content-header card-header ">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h5 class="m-0 text-bold">Pilihan Tempat Training</h5>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- /.container-fluid -->
                            </div>

                            <div class="row mt-2">
                                @foreach ($pilihan_tempat_training->Siswa->hasPilihanTempatTraining as $PilihanTempatTraining)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="img-thumbnail">
                                                <img src="{{ asset('dist/img/' . $PilihanTempatTraining->gambar) }}"
                                                    class="card-img-top image-style" alt="gambar training">
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <strong>Nama:</strong>
                                                    {{ $PilihanTempatTraining->nama_tempat_training }} <br>
                                                    <strong>Alamat:</strong>
                                                    {{ $PilihanTempatTraining->alamat_tempat_training }}
                                                    <br>
                                                    <strong>Posisi:</strong> {{ $PilihanTempatTraining->lowongan_training }}
                                                </p>

                                                <div class="mt-3">
                                                    <a href="{{ route('showPilihanTempatTraining', ['id' => $PilihanTempatTraining->id]) }}"
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
            @endif

            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="card col-md-12">
                    <div class="card-body">
                        <div class="content-header card-header ">
                            <div class="container-fluid">
                                <div class="form-group mb-2">
                                    <div class="form-row float-left">
                                        <h5 class="float-left text-bold">Tempat Training</h5>
                                    </div><!-- /.col -->
                                    @if (in_array(auth()->user()->role_id, ['1', '2']))
                                        <div class="form-row float-right">
                                            <input type="button"
                                                onclick="window.location='{{ route('formtempattraining') }}'"
                                                class="btn bgcolor text-white float-right" value="+ Tambah Data">
                                        </div><!-- /.col -->
                                    @endif
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>

                        <div class="row mt-2">
                            @foreach ($data_tempat_training as $tempatTraining)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="img-thumbnail">
                                            <img src="{{ asset('dist/img/' . $tempatTraining->gambar) }}"
                                                class="card-img-top image-style" alt="gambar training">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                <strong>Nama :</strong>{{ $tempatTraining->nama_tempat_training }}<br>
                                                <strong>Alamat :</strong> {{ $tempatTraining->alamat_tempat_training }}
                                                <br>
                                                <strong>Posisi :</strong> {{ $tempatTraining->lowongan_training }} <br>
                                            </p>

                                            @if (in_array(auth()->user()->role_id, ['1', '2']))
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
                                            @endif

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
