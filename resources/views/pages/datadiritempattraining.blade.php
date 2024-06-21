@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="card card-primary">

            <div class="text-bold p-3">
                <a class="kembali" href="{{ route('tempattraining') }}"> &lt; Kembali</a>
            </div>

            <div>
                <h3 class="text-bold px-3">Form Tempat Training</h3>
            </div>
            <!-- form start -->
            <form method="POST" action="{{ route('tempattraining') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <p>{{ auth()->user()->name }}</p>
                    </div>

                    <div class="form-group">
                        <label for="nis">Nisn</label>
                        <p>{{ $nisn }}</p>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                        <p>{{ auth()->user()->no_hp }}</p>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <p>{{ auth()->user()->email }}</p>
                    </div>

                    <div class="form-group">
                        <label for="email">Nama Tempat Training</label>
                        <p>{{ $tempat_training->nama_tempat_training }}</p>
                    </div>

                    <div class="form-group ">
                        {{-- <label for="id_tempat_Training">Tempat Training</label> --}}
                        <input type="hidden" class="form-control" id="id_tempat_Training" name="id_tempat_Training"
                            value={{ $tempat_training->id }}>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="form-group">
                        <label for="pertanyaan">Apakah anda yakin dengan pilihan anda?</label>
                        <p class="text-bold "><input type="radio" id="pilihan-ya" name="pilihan" class="mr-2">Ya,saya
                            yakin</p>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn custom-border hover-element textcolor btn-block" id="btn-daftar"
                            disabled>Daftar</button>
                    </div>
                </div>

                <script>
                    document.getElementById('pilihan-ya').addEventListener('change', function() {
                        document.getElementById('btn-daftar').disabled = !this.checked;
                    });
                </script>


            </form>
        </div>
    </div>
@endsection
