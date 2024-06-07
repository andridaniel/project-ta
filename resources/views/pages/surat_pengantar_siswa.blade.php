@extends('layouts.main')

@section('konten')
    <div class="card m-2">
        <div>
            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('Surat') }}"> &lt; Kembali</a>
            </div>



            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            <div class="card m-2">
                <div class="card-header bgcolor ">
                    <h3 class="card-title text-bold text-light">Surat Pengantar Siswa</h3>
                </div>
                @foreach ($siswas as $siswa)
                    @foreach ($siswa->hasPilihanTempatTraining as $tempatTraining)
                        <div class="m-2 p-3">
                            <form
                                action="{{ route('storesurat', ['id_siswa' => $tempatTraining->pivot->id_siswa, 'id_pilihan_tempat_training' => $tempatTraining->pivot->id_tempat_Training]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="file_surat_pengantar_{{ $tempatTraining->id }}">Tempat Training:
                                        {{ $tempatTraining->nama_tempat_training }}</label>
                                    <input type="file" class="form-control"
                                        id="file_surat_pengantar_{{ $tempatTraining->id }}" name="file_surat_pengantar">
                                    @error('file_surat_pengantar')
                                        <div>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group m-2">
                                    <button class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @endforeach

            </div>


            {{-- hapus data siswa --}}

            <div class="card m-2 mt-4 mb-5">
                <div class="card-header bgcolor">
                    <h3 class="card-title text-bold text-light">Hapus Surat Pengantar Siswa</h3>
                </div>

                @foreach ($data_surats as $surat)
                    <div class=" card p-3 m-2">
                        <div class="text-bold">
                            <p>Nama Tempat Training : {{ $surat->tempatTraining->nama_tempat_training }}</p>
                        </div>
                        <div class="m-2">
                            <a href="{{ asset('dist/surat/' . $surat->file_surat_pengantar) }}" target="_blank"
                                class="text-primary">
                                Lihat File Surat Pengantar : {{ $surat->file_surat_pengantar }}
                            </a>

                            <form id="deleteForm{{ $surat->id }}"
                                action="{{ route('surat_pengantar_siswa.deleteSuratPengantar', $surat->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger  deleteSuratPengantar"
                                    data-surat-id="{{ $surat->id }}">Hapus</button>
                            </form>
                        </div>



                    </div>
                @endforeach
            </div>





        </div>
    </div>


    <script>
        document.querySelectorAll('.deleteSuratPengantar').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Apakah Anda yakin ingin menghapus surat ini?')) {
                    const suratId = this.getAttribute('data-surat-id');
                    document.getElementById('deleteForm' + suratId).submit();
                }
            });
        });
    </script>
@endsection
