@extends('layouts.main')

@section('konten')

<div class="px-5 p-2">
    <div class="card card-primary">

        <div class="text-bold p-3">
            <a class="kembali" href="{{ route('tempatmagang') }}"> &lt; Kembali</a>
        </div>

        <div>
            <h3 class="text-bold px-3">Detail Tempat Magang</h3>
        </div>
        <!-- form start -->
        <form>
          <div class="card-body">
                <div class="form-group">
                    <img src="{{ asset('dist/img/bg-hotel.png') }}" alt="gambar hotel" width="400">
                </div>

            <div class="form-group">
                <h5 class="text-bold">Nama Hotel</h5>
                <p>jl.sunsetroat no 46 kec.kuta</p>
                <p>No Telepon : <span> 08987654321</span></p>
                <p>Email : <span> 0fU0j@example.com</span></p>
            </div>

            <div class="form-row card-footer">
                <label for="alamathotel">Lowongan Yang Tersedia</label>
                <div class="form-group col-md-10">
                    <p class="text-bold">House keeping</p>
                </div>

               <div class="form-group col-md-2">
                   <a href="{{ route('datadiritempatmagang') }}" class="btn custom-border hover-element textcolor">Daftar</a>
               </div>
              
            </div>

    
            <div class="form-group">
              <label for="emailhotel">Rician Kegiatan</label>
              <p>Pengenalan Lingkungan kerja:</p>
              <p>
                Tur dan pengenalan terhadap berbagai area di departemen housekeeping, termasuk kamar tamu, lobi, ruang publik, dan ruang penyimpanan.
                Pengenalan terhadap peralatan, produk pembersih, dan perlengkapan kerja yang digunakan dalam kegiatan housekeeping.
              </p>
            </div>

            <div class="form-group">
                <label for="emailhotel">Prosedur Pendafataran</label>
                <p>Prosedur yang diperlukan adalah Sebagai berikut:</p>
                <p>
                    Prosedur yang diperlukan adalah sebagai berikut:
                    Pengumpulan Dokumen: Calon magang harus menyertakan dokumen-dokumen berikut dalam aplikasi mereka:
                    Surat lamaran magang yang ditujukan kepada Manajer SDM Hotel ABCD.
                    Daftar riwayat hidup (CV) yang mencantumkan pendidikan terakhir, pengalaman kerja (jika ada), dan keahlian yang relevan.
                    Fotokopi identitas diri (KTP/SIM/Paspor).
                    Surat rekomendasi dari institusi pendidikan terakhir atau referensi kerja (jika ada).
                    Peninjauan Aplikasi: Tim SDM Hotel ABCD akan meninjau aplikasi magang yang diterima. Pengalaman sebelumnya, keahlian, dan motivasi akan menjadi faktor penentu dalam seleksi.
                    Wawancara: Calon magang yang lolos seleksi administrasi akan diundang untuk wawancara dengan tim SDM. Wawancara akan membahas lebih lanjut motivasi, ekspektasi, dan kesiapan calon magang untuk menjalani program magang.
                    Penetapan Jadwal Magang: Setelah melewati tahap wawancara, calon magang yang diterima akan menerima pemberitahuan resmi melalui email atau telepon. Mereka akan diminta untuk menyepakati jadwal dan detail program magang, termasuk tanggal mulai dan berakhirnya magang.
                    Pengenalan Program Magang: Sebelum memulai magang, calon magang akan diundang untuk menghadiri sesi pengenalan yang diselenggarakan oleh tim SDM. Sesi ini akan mencakup penjelasan tentang aturan, tanggung jawab, dan harapan selama masa magang.
                    Pelaksanaan Magang: Calon magang akan memulai program magang mereka sesuai dengan jadwal yang telah ditetapkan. Mereka akan ditempatkan di berbagai departemen hotel, seperti pelayanan tamu, dapur, keuangan, atau administrasi, sesuai dengan minat dan keahlian mereka.
                    Evaluasi dan Umpan Balik: Selama masa magang, kinerja calon magang akan dievaluasi secara berkala oleh supervisor atau mentor di masing-masing departemen. Mereka juga akan diberikan umpan balik untuk membantu mereka berkembang selama program magang.
                    Penyelesaian Magang: Setelah menyelesaikan program magang, calon magang akan menerima sertifikat atau surat penghargaan atas partisipasi dan kontribusi mereka selama masa magang di Hotel ABCD.
                </p>
              </div>
        

        </form>
      </div>
</div>

@endsection