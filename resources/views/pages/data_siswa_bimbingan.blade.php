@extends('layouts.main')

@section('konten')
    <div class="px-2 p-2 mx-2">
        <div class="card">

            <div class="content-header card-header">
                <div class="text-bold p-3">
                    <a class="kembali" href="{{ route('dashboard') }}"> &lt; Kembali</a>
                </div>

                <div>
                    <h3 class="text-bold px-3">Data Siswa Bimbingan </h3>
                </div>
            </div>

            <!-- form start -->
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row p-2 mt-3">
                    <!-- /.col -->
                    @foreach ($siswa as $siswa)
                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user shadow">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info">
                                    <h3 class="widget-user-username">{{ $siswa->user->name }}</h3>
                                    <h5 class="widget-user-desc">{{ $siswa->nisn }}</h5>
                                </div>
                                <div class="widget-user-image">
                                    <img class="img-circle elevation-2"
                                        src="{{ asset('dist/img/' . $siswa->user->gambar_profile) }}" alt="User Avatar">
                                </div>
                                <div class="card-footer">
                                    <div class="form-group">
                                        <h5 class="widget-user-username">{{ $siswa->kelas }}</h5>
                                    </div>
                                    <div class="form-group">
                                        <div class="mt-3">
                                            <a href="{{ route('detail_siswa_bimbingan', ['id' => $siswa->id]) }}"
                                                class="btn bg-info text-white btn-block">More Information</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
@endsection
