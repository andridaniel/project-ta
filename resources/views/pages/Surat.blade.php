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
                                @foreach ($suratKerapian as $key => $surat_kerapian)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if ($surat_kerapian->user)
                                                {{ $surat_kerapian->user->siswa->nisn }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($surat_kerapian->user)
                                                {{ $surat_kerapian->user->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($surat_kerapian->user)
                                                {{ $surat_kerapian->user->siswa->kelas }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ asset('dist/surat/' . $surat_kerapian->file_surat_kerapian) }}"
                                                target="_blank">
                                                Lihat Surat Kerapian
                                            </a>
                                        </td>

                                        <td>
                                            <form action="{{ route('Surat.destroy', ['id' => $surat_kerapian->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="badge bg-danger">
                                                    <i class="nav-icon fas fa-trash-alt px-1"></i>
                                                    Hapus File
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

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
                <form action="{{ route('Surat.StoreSurat') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card m-3">
                        <div class="form-group card-body">
                            <div class="form-row ">
                                <div class="form-group col-md-10">
                                    <input type="file" class="form-control" id="file_surat_pengantar"
                                        name="file_surat_pengantar">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                </form>

                @foreach ($surats as $surat)
                    <a href="{{ asset('dist/surat/' . $surat->file_surat_pengantar) }}" target="_blank"
                        class="text-primary">
                        Lihat File Surat Pengantar : {{ $surat->file_surat_pengantar }}
                    </a>

                    <form id="deleteForm{{ $surat->id }}" action="{{ route('Surat.deleteSurat', $surat->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger mx-1 mt-2 deleteSurat"
                            data-surat-id="{{ $surat->id }}">Hapus</button>
                    </form>
                @endforeach
            @endif



            <script>
                document.querySelectorAll('.deleteSurat').forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        if (confirm('Apakah Anda yakin ingin menghapus surat ini?')) {
                            const suratId = this.getAttribute('data-surat-id');
                            document.getElementById('deleteForm' + suratId).submit();
                        }
                    });
                });
            </script>
        </div>
    </div>

    {{-- surat pengantar untuk siswa --}}
    @if (auth()->user()->role_id == '3')
        <form action="" method="post">
            <div class="card m-3">
                <div class="form-group">
                    <div class="card-header">
                        <h5 class=" text-bold">Surat Pengantar</h5>
                        <i class="float-right">Surat Pengantar Dapat di download disini</i>
                    </div>
                    <div class="form-row px-3 mt-4">
                        @foreach ($surats as $surat)
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control" id="file_surat_pengantar"
                                    name="file_surat_pengantar" value="{{ $surat->file_surat_pengantar }}" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <a href="{{ asset('dist/surat/' . $surat->file_surat_pengantar) }}" class="btn btn-primary"
                                    download>Download</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>




        {{-- untuk form kerapian siswa --}}
        <form action="{{ route('Surat.StoreSuratKerapian') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card m-3">
                <div class="form-group">
                    <div class="card-header">
                        <h5 class=" text-bold">Form Kerapian</h5>
                        <i class="float-right">Tambahkan surat kerapian disini</i>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="form-row px-3 mt-4 ">
                        <div class="form-group col-md-10">
                            <input type="file" class="form-control" id="file_surat_kerapian" name="file_surat_kerapian">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
        </form>

        @foreach ($suratKerapian as $surat_kerapian)
            @if ($surat_kerapian->id_siswa == auth()->user()->id)
                <div class="my-3">
                    <p class="px-3 text-bold">Nama File:
                        <a href="{{ asset('dist/surat/' . $surat_kerapian->file_surat_kerapian) }}" target="_blank"
                            class="text-primary">
                            {{ $surat_kerapian->file_surat_kerapian }}
                        </a>
                    </p>

                    <form id="deleteForm{{ $surat_kerapian->id }}"
                        action="{{ route('Surat.deleteSuratKerapian', $surat_kerapian->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger mx-3 deleteSuratKerapian"
                            data-surat-id="{{ $surat_kerapian->id }}">Hapus</button>
                    </form>
                </div>
            @endif
        @endforeach


        <script>
            document.querySelectorAll('.deleteSuratKerapian').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirm('Apakah Anda yakin ingin menghapus surat ini?')) {
                        const suratId = this.getAttribute('data-surat-id');
                        try {
                            document.getElementById('deleteForm' + suratId).submit();
                        } catch (error) {
                            console.error(error);
                            alert('Terjadi kesalahan saat menghapus surat.');
                        }
                    }
                });
            });
        </script>
    @endif

    </div>
    </div>
@endsection
