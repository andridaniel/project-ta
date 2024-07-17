@extends('layouts.main')

@section('konten')
    <div class=" p-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        @if (auth()->user()->role_id == '2')
                            <div class="text-bold p-2 float-right">
                                <a class="kembali" href="{{ route('dashboard') }}"> &lt; Kembali</a>
                            </div>
                        @endif
                        <div>
                            <h3 class="card-title text-bold "> Data Siswa</h3>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Status</th>
                                <th>Nama Lengkap</th>
                                <th>NO Hp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_siswa as $key => $dataPengguna)
                                <tr>
                                    <td> {{ $data_siswa->firstItem() + $key }}</td>
                                    <td>{{ $dataPengguna->User->Role->nama }}</td>
                                    <td>{{ $dataPengguna->User->name }}</td>
                                    <td>{{ $dataPengguna->User->no_hp }}</td>
                                    @if (auth()->user()->role_id == '1')
                                        <td width="20%">
                                            <div class="form-row ">
                                                <div class="form-group mx-auto">
                                                    @if (in_array($dataPengguna->id, $idSiswaWithTrainingData))
                                                        <button class="badge btn bg-danger" data-toggle="modal"
                                                            data-target="#exampleModal">
                                                            <i class="fa-sharp fas fa-trash px-1"></i>
                                                        </button>

                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus
                                                                            Data Siswa</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="container m-2">
                                                                        <h1>Hapus Siswa</h1>
                                                                        <p>Apakah Anda yakin ingin menghapus siswa ini?</p>

                                                                        @if ($allIdSiswa)
                                                                            <p>Siswa ini memiliki relasi dengan tabel lain.
                                                                                Penghapusan ini juga
                                                                                akan menghapus data yang
                                                                                berhubungan dengan siswa</p>
                                                                        @endif

                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-toggle="modal"
                                                                            data-target="#confirmDeleteModal">
                                                                            Hapus Siswa
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="confirmDeleteModal"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="confirmDeleteModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content ">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            id="confirmDeleteModalLabel">
                                                                                            Konfirmasi Penghapusan</h5>
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body mx-auto">
                                                                                        Apakah Anda yakin ingin menghapus
                                                                                        siswa ini? Tindakan ini
                                                                                        tidak dapat dibatalkan.
                                                                                        apabila tidak ingin mengahapus data
                                                                                        ini
                                                                                    </div>
                                                                                    <div class="modal-footer ">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">Batal</button>
                                                                                        <form
                                                                                            action="{{ route('delete_siswa', ['id' => $dataPengguna->id]) }}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger m-5">Hapus
                                                                                                data siswa</button>
                                                                                        </form>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <form
                                                            action="{{ route('delete_siswa', ['id' => $dataPengguna->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="badge btn bg-danger"><i
                                                                    class="fa-sharp fas fa-trash px-1"></i></button>
                                                        </form>
                                                    @endif
                                                </div>

                                                <div class="form-group mx-auto">
                                                    <a href="{{ route('edit_siswa', ['id' => $dataPengguna->id]) }}"
                                                        class="badge bg-primary">
                                                        <i class="fas fa-pen px-1"></i>
                                                    </a>
                                                </div>

                                                <div class="form-group mx-auto">
                                                    <a href="{{ route('detail_siswa', ['id' => $dataPengguna->id]) }}"
                                                        class="badge bg-info">
                                                        <i class="fa-sharp fas fa-eye px-1"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix ">
                    <div class="float-right">
                        {{ $data_siswa->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

    {{-- modal --}}
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container m-2">
                    <h1>Hapus Siswa</h1>
                    <p>Apakah Anda yakin ingin menghapus siswa ini?</p>

                    @if ($allIdSiswa)
                        <p>Siswa ini memiliki relasi dengan tabel lain. Penghapusan ini juga akan menghapus data yang
                            berhubungan dengan siswa</p>
                    @endif

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">
                        Hapus Siswa
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-auto">
                                    Apakah Anda yakin ingin menghapus siswa ini? Tindakan ini tidak dapat dibatalkan.
                                    apabila tidak ingin mengahapus data ini
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <form  action="{{ route('delete_siswa', ['id' => $dataPengguna->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-5">Hapus data siswa</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
