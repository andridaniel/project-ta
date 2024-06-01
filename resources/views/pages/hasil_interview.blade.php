@extends('layouts.main')

@section('konten')
    {{-- untuk hasil interview siswa --}}

    <div class="card-body m-2">
        <div class="card m-1">
            <div class="card-header bgcolor text-white">
                <h5 class=" text-bold">Hasil Interview</h5>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @foreach ($hasilInterviews as $hasil_interview)
                <form
                    action="{{ route('hasil_interview.updateInterview', ['id_siswa' => $hasil_interview->siswa->id, 'id_tempat_training' => $hasil_interview->id_tempat_training, 'id' => $hasil_interview->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card m-2">
                        <div class="form-row px-3">
                            <ul class="mt-2 text-bold">
                                <li>Nama Siswa : {{ $hasil_interview->siswa->user->name }}</li>
                                <li>NISN : {{ $hasil_interview->siswa->nisn }}</li>
                                <li>Tempat Training : {{ $hasil_interview->tempatTraining->nama_tempat_training }}</li>

                            </ul>

                        </div>
                        <div class="card m-2">
                            <div class="form-group px-3 mt-2">
                                <label for="file_hasil_interview">File hasil Interview</label><label
                                    class="text-danger"></label>
                                <div>
                                    <a href="{{ asset('dist/interview/' . $hasil_interview->file_hasil_interview) }}"
                                        target="_blank" class="text-primary form-control">
                                        {{ $hasil_interview->file_hasil_interview }}
                                    </a>

                                </div>
                            </div>
                            <div class="form-group col-md-12 px-3">
                                <select name="keterangan" id="keterangan" class="form-control">
                                    <option value="" disabled>--pilih keterangan--</option>
                                    <option value="Diproses" @if ($hasil_interview->keterangan == 'Diproses') selected @endif>Diproses
                                    </option>
                                    <option value="Diterima" @if ($hasil_interview->keterangan == 'Diterima') selected @endif>Diterima
                                    </option>
                                    <option value="Ditolak" @if ($hasil_interview->keterangan == 'Ditolak') selected @endif>Ditolak
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary mx-3">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach


        </div>

    </div>
@endsection
