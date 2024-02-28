@extends('layouts.main')

@section('konten')

<div class="px-5 p-2">
    <div class="card card-primary">

        <div class="text-bold p-3">
            <a class="kembali" href="{{ route('tempatmagang') }}"> &lt; Kembali</a>
        </div>

        <div>
            <h3 class="text-bold px-3">Form Tempat Magang</h3>
        </div>
        <!-- form start -->
        <form>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama</label>
              <p>Andri</p>
            </div>

            <div class="form-group">
              <label for="nis">Nis</label>
              <p>1234567</p>
            </div>

            <div class="form-group">
              <label for="telepon">Nomor Telepon</label>
              <p>0987654321</p>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <p>0fU0j@example.com</p>
            </div>
           
          </div>
          <!-- /.card-body -->
          
        <div class="card-footer">
            <div class="form-group">
                <label for="pertanyaan">Apakah anda yakin dengan pilihan anda?</label>
                <p class="text-bold "><input type="radio" id="pilihan-ya" name="pilihan" class="mr-2" >Ya,saya yakin</p>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn custom-border hover-element textcolor btn-block" id="btn-daftar" disabled>Daftar</button>
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