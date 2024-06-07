@extends('layouts.main')

@section('konten')

    {{-- //untuk Guru pembimbing --}}
    @if (auth()->user()->role_id == '2')
        <div class=" p-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bgcolor">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title text-bold text-light "> Data Siswa <span>Yang Mengirimkan Surat
                                        Kerapian</span>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nisn</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $key => $siswa)
                                    <tr>
                                        <td>{{ $siswas->firstItem() + $key }}</td>
                                        <td>{{ $siswa->nisn }}</td>
                                        <td>{{ $siswa->user->name }}</td>
                                        <td>{{ $siswa->kelas }}</td>
                                        @if ($siswa->hasSuratKerapian)
                                            <td>
                                                <a href="{{ asset('dist/surat/' . $siswa->hasSuratKerapian->file_surat_kerapian) }}"
                                                    target="_blank">
                                                    Lihat Surat Kerapian
                                                </a>
                                            </td>

                                            <td>
                                                <form
                                                    action="{{ route('Surat.destroy', ['id' => $siswa->hasSuratKerapian->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge btn bg-danger">
                                                        <i class="nav-icon fas fa-trash-alt px-1"></i>
                                                        Hapus File
                                                    </button>
                                                </form>

                                            </td>
                                        @else
                                            <td colspan="2">Tidak ada file surat kerapian</td>
                                        @endif
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix ">
                        <div class="float-right">
                            {{ $siswas->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    @endif


    <div class="px-2 p-2 mx-2">
        <div class="card">
            @if (auth()->user()->role_id == '2')
                <div class="content-header card-header bgcolor">
                    <div>
                        <h3 class="card-title text-light text-bold px-3">Surat Pengantar</h3>
                    </div>
                </div>

                <!-- form start -->
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card m-3">
                        <div class="form-group card-body">
                            <div class="row">
                                @forelse ($daftar_surat_pengantar_siswa as $siswa)
                                    <div class="col-md-4 ">
                                        <!-- Widget: user widget style 1 -->
                                        <div class="card card-widget widget-user shadow ">
                                            <!-- Add the bg color to the header using any of the bg-* classes -->
                                            <div class="widget-user-header bg-info">
                                                <h3 class="widget-user-username">{{ $siswa->user->name }}</h3>
                                            </div>
                                            <div class="widget-user-image">
                                                <img class="img-circle elevation-2"
                                                    src="{{ asset('dist/img/' . $siswa->user->gambar_profile) }}"
                                                    alt="User Avatar">
                                            </div>
                                            <div class="card-footer img-thumbnail ">
                                                <h6 class="text-bold">Pilihan Training :</h6>
                                                @foreach ($siswa->hasPilihanTempatTraining as $tempatMagang)
                                                    <h6>Tempat training
                                                        {{ $loop->iteration }} : {{ $tempatMagang->nama_tempat_training }}
                                                    </h6>
                                                @endforeach
                                                <div class="form-group ">
                                                    <div class="mt-3">
                                                        <a href="{{ route('SuratPengantarSiswa', ['id' => $siswa->id]) }}"
                                                            class="btn bg-info text-white btn-block">Upload Surat
                                                            Pengantar</a>
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                        <!-- /.widget-user -->
                                    </div>
                                @empty
                                    <div>
                                        <i class="mx-auto">Tidak ada data Surat Pengantar</i>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                </form>
            @endif

        </div>
    </div>


    @if (auth()->user()->role_id == '3')
        {{-- untuk form kerapian siswa --}}

        @if (!$suratKerapian)
            <form action="{{ route('Surat.StoreSuratKerapian') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card m-3">

                    <div class="form-group">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <div class="card m-3">
                            <div class="card-header text-light bgcolor">
                                <h5 class=" text-bold ">Surat Kerapian</h5>
                                {{-- <i class="float-right">Tambahkan surat kerapian disini</i> --}}
                            </div>
                            <div class="form-row px-3 mt-4 ">
                                <div class="form-group col-md-10">
                                    <input type="file" class="form-control" id="file_surat_kerapian"
                                        name="file_surat_kerapian">
                                    @error('file_surat_kerapian')
                                        <div>
                                            <p class="text-danger">Terjadi kesalahan,{{ $message }}</p>

                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
            </form>
        @endif

        @if ($suratKerapian)
            <div class="card m-3">
                <div>
                    <div class="card-header text-light bgcolor">
                        <h5 class=" text-bold card-title ">Surat Kerapian</h5>
                        {{-- <i class="float-right">Tambahkan surat kerapian disini</i> --}}
                    </div>
                    <i class="float-right p-2">Hapus Jika Terjadi Kesalahan</i>
                    <p class="px-3 mt-3 text-bold">Nama File:
                        <a href="{{ asset('dist/surat/' . $suratKerapian->file_surat_kerapian) }}" target="_blank"
                            class="text-primary">
                            {{ $suratKerapian->file_surat_kerapian }}
                        </a>
                    </p>

                    <form id="deleteForm{{ $suratKerapian->id }}"
                        action="{{ route('Surat.deleteSuratKerapian', $suratKerapian->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-3 mb-3 deleteSuratKerapian"
                            data-surat-id="{{ $suratKerapian->id }}">Hapus</button>
                    </form>
                </div>
            </div>
        @endif

        <div class="card m-3">
            <form action="" method="post">

                <div class="form-group">
                    <div class="card-header text-light bgcolor">
                        <h5 class=" text-bold card-title">Surat Pengantar</h5>
                        {{-- <i class="float-right">Surat Pengantar Dapat di download disini</i> --}}
                    </div>
                    <div class=" px-2 mt-4">
                        {{-- @foreach ($surats as $surat) --}}
                        @forelse ($surats as $surat)
                            <div class="card">
                                <div class="mx-2">
                                    <p class="text-bold">Nama Tempat Training :
                                        {{ $surat->tempatTraining->nama_tempat_training }}</p>
                                </div>
                                <div class="form-row mx-1 ">
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" id="file_surat_pengantar"
                                            name="file_surat_pengantar" value="{{ $surat->file_surat_pengantar }}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <a href="{{ asset('dist/surat/' . $surat->file_surat_pengantar) }}"
                                            class="btn btn-primary" download>Download</a>
                                    </div>
                                </div>

                            </div>


                        @empty
                            <div>
                                <i>Surat Pengantar Belum ada</i>
                            </div>
                        @endforelse
                        {{-- @endforeach --}}
                    </div>
                </div>
            </form>
        </div>
    @endif



    </div>

    </div>

    <script>
        document.getElementById('siswa').addEventListener('change', function() {
            var fileUploadDiv = document.getElementById('file-upload');
            var submitButtonDiv = document.getElementById('submit-button');

            if (this.value) {
                fileUploadDiv.style.display = 'block';
                submitButtonDiv.style.display = 'block';
            } else {
                fileUploadDiv.style.display = 'none';
                submitButtonDiv.style.display = 'none';
            }
        });

        document.querySelector('.deleteSuratKerapian').addEventListener("click", (e) => {
            if (confirm('Apakah Anda yakin ingin menghapus surat ini?')) {
                const suratId = this.getAttribute('data-surat-id');
                try {
                    document.getElementById('deleteForm' + suratId).submit();
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat menghapus surat.');
                }
            }
        })
    </script>



@endsection
