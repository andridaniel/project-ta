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
                            <h3 class="card-title text-bold "> Data Guru Pembimbing</h3>
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
                                <th>No Hp</th>
                                @if (auth()->user()->role_id == '1')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_GuruPembimbing as $key => $dataPengguna)
                                <tr>
                                    <td> {{ $data_GuruPembimbing->firstItem() + $key }}</td>
                                    <td>{{ $dataPengguna->User->Role->nama }}</td>
                                    <td>{{ $dataPengguna->User->name }}</td>
                                    <td>{{ $dataPengguna->User->no_hp }}</td>

                                    @if (auth()->user()->role_id == '1')
                                        <td width="20%">
                                            <div class="form-row">
                                                <div class="form-group mx-auto">
                                                    <form
                                                        action="{{ route('delete_guru_pembimbing', ['id' => $dataPengguna->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="badge btn bg-danger"><i
                                                                class="fa-sharp fas fa-trash px-1"></i></button>
                                                    </form>
                                                </div>

                                                <div class="form-group mx-auto">
                                                    <a href="{{ route('edit_guru_pembimbing', ['id' => $dataPengguna->id]) }}"
                                                        class="badge bg-primary">
                                                        <i class="fas fa-pen px-1"></i>
                                                    </a>
                                                </div>

                                                <div class="form-group mx-auto">
                                                    <a href="{{ route('detail_guru_pembimbing', ['id' => $dataPengguna->id]) }}"
                                                        class="badge bg-info">
                                                        <i class="fa-sharp fas fa-eye px-1"></i>
                                                    </a>
                                                </div>

                                                {{-- <div class="form-group mx-1">
                                                <a href="{{ route('tambah_data_guru_pembimbing') }}" class="badge bg-dark">
                                                    <i class="nav-icon fas fa-plus px-1"></i> Lengkapi Data
                                                </a>
                                            </div> --}}

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
                        {{ $data_GuruPembimbing->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
