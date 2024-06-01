@extends('layouts.main')

@section('konten')
    {{-- untuk hasil interview siswa --}}
    @if (auth()->user()->role_id == '3')
        <div class="card m-3 ">
            <div class="card-header bgcolor ">
                <h5 class="text-bold text-light"> Jadwal Interview & Upload Hasil Interview</h5>
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


            @foreach ($pilihan_tempat_training as $pilihan)
                <form
                    action="{{ route('StoreInterview', ['id_siswa' => $pilihan->siswa->id, 'id_tempat_training' => $pilihan->id_tempat_Training]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-2">
                        <div class="form-group m-2">
                            <ul>
                                <li class="text-bold">Nama Tempat Training :
                                    {{ $pilihan->tempatTraining->nama_tempat_training }}</li>
                                <li class="text-bold">Alamat :
                                    {{ $pilihan->tempatTraining->alamat_tempat_training }}</li>
                                <li class="text-bold">Jadwal Interview : {{ $pilihan->tempatTraining->jadwal_interview }}
                                    <span class="text-danger">jam : {{ $pilihan->tempatTraining->waktu_interview }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="m-4">
                            <div class="form-group">
                                <div>
                                    <label for="file_hasil_interview">File Hasil Interview</label>
                                    <input type="file" name="file_hasil_interview" id="file_hasil_interview"
                                        class="form-control">
                                    @error('file_hasil_interview')
                                        <div>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <input type="hidden" name="keterangan" id="keterangan" value="DiProses" readonly
                                        class="form-control">
                                </div>

                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn bg-primary">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>

        {{-- hapus data hasil interview untuk siswa --}}

        <div class="card m-3">
            <div>
                <div class="card-header text-light bgcolor">
                    <h5 class=" text-bold ">Hasil Interview</h5>
                    {{-- <i class="float-right">Tambahkan surat kerapian disini</i> --}}
                </div>

                @foreach ($hasilInterviews as $hasilInterview)
                    <div class=" card m-3">
                        <div class="m-3">
                            <input type="text" name="keterangan" id="keterangan"
                                value="{{ $hasilInterview->keterangan }}"
                                class=" @if ($hasilInterview->keterangan == 'Ditolak') bg-danger @endif @if ($hasilInterview->keterangan == 'DiProses') bg-info @endif card bg-success btn btn-block text-white"
                                readonly>
                        </div>
                        <p class="px-3 mt-1 text-bold">Nama File:
                            <a href="{{ asset('dist/interview/' . $hasilInterview->file_hasil_interview) }}" target="_blank"
                                class="text-primary">
                                {{ $hasilInterview->file_hasil_interview }}
                            </a>

                        </p>

                        <form id="deleteForm{{ $hasilInterview->id }}"
                            action="{{ route('jadwal_interview.deleteHasilInterview', $hasilInterview->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn custom-border hover-element mx-3 mb-3 deleteSuratKerapian"
                                data-surat-id="{{ $hasilInterview->id }}">Hapus file ?</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <script>
        document.querySelector('.deleteHasilInterview').addEventListener("click", (e) => {
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
