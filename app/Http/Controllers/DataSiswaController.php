<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru_Pembimbing;
use App\Models\Surat_Kerapian;
use App\Models\Laporan_Akhir;
use App\Models\Laporan_Mingguan;
use App\Models\Hasil_Interview;
use App\Models\Surat;
use App\Models\Tempat_Training;
use App\Models\Pilihan_Tempat_Training;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataSiswaController extends Controller
{
    public function index()
    {

        // Dapatkan ID siswa yang memiliki data di tabel `data_pilihan_tempat_training`
        $idSiswaWithTrainingData = Pilihan_Tempat_Training::select('id_siswa')->pluck('id_siswa')->toArray();

        // Filter siswa yang tidak memiliki data di tabel `data_pilihan_tempat_training`
        $siswaWithoutTrainingData = Siswa::whereNotIn('id', $idSiswaWithTrainingData)->get();

        $data_siswa = Siswa::with(['User', 'User.Role'])->paginate(5);

        $idSiswaLaporanAkhir = Laporan_Akhir::select('id_siswa')->pluck('id_siswa')->map(function($item) {
            return ['id' => $item, 'table' => 'Laporan Akhir'];
        });

        $idSiswaLaporanMingguan = Laporan_Mingguan::select('id_siswa')->pluck('id_siswa')->map(function($item) {
            return ['id' => $item, 'table' => 'Laporan Mingguan'];
        });

        $idSiswaHasilInterview = Hasil_Interview::select('id_siswa')->pluck('id_siswa')->map(function($item) {
            return ['id' => $item, 'table' => 'Hasil Interview'];
        });

        $idSiswaSuratKerapian = Surat_Kerapian::select('id_siswa')->pluck('id_siswa')->map(function($item) {
            return ['id' => $item, 'table' => 'Surat Kerapian'];
        });

        $idSiswaSuratPengantar = Surat::select('id_siswa')->pluck('id_siswa')->map(function($item) {
            return ['id' => $item, 'table' => 'Surat Pengantar'];
        });

              // Menggabungkan semua id_siswa dan menghilangkan duplikat
              $allIdSiswa = $idSiswaLaporanAkhir
                  ->merge($idSiswaLaporanMingguan)
                  ->merge($idSiswaHasilInterview)
                  ->merge($idSiswaSuratKerapian)
                  ->merge($idSiswaSuratPengantar)
                  ->unique('id');
        return view('pages.pagesadmin.data_siswa', compact('data_siswa','allIdSiswa', 'idSiswaWithTrainingData'));



    }

    public function TambahDataSiswa(User $user)
    {

        $guru_pembimbing = User::with('Guru_Pembimbing')->where('role_id', 2)->get();
        if(!$user){
            return redirect()->route('userregister')->with('error','data gagal ditambahkan.');

        }

        // dd ($guru_pembimbing);
        return view('pages.pagesadmin.tambah_data_siswa', compact('user', 'guru_pembimbing'));
    }

    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'guru_pembimbing_id' => 'required',
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',
            'nama_orangtua' => 'required',
            'no_hp_orangtua' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }


        // validate_tgl_lahir
        $tgl_lahir = $request->input('tgl_lahir');
        $now = Carbon::now();
        $birthDate = Carbon::parse($tgl_lahir);

        // Validasi tanggal lahir tidak boleh di masa depan
        if ($birthDate > $now) {
            return redirect()->back()->withErrors(['tgl_lahir' => 'Tanggal lahir tidak boleh melebihi tanggal sekarang']);
        }

        // Validasi umur minimal 15 tahun dan maksimal 19
        $minAge = 15;
        $maxAge = 19;
        $minDate = $now->copy()->subYears($maxAge);
        $maxDate = $now->copy()->subYears($minAge);

        if ($birthDate > $maxDate) {
            return redirect()->back()->withErrors(['tgl_lahir' => 'Umur siswa harus minimal 15 tahun.']);
        }

        if ($birthDate < $minDate) {
            return redirect()->back()->withErrors(['tgl_lahir' => 'Umur siswa harus maksimal 19 tahun.']);
        }


        $validated_input = $validator->validated();

        // Menyimpan user_id
        $validated_input['user_id'] = auth()->user()->id;

         // Menyimpan guru_pembimbing_id
        $validated_input['guru_pembimbing_id'] = $request->guru_pembimbing_id; // Menggunakan nilai dari form

        // Menyimpan data
        $user->Siswa()->create($validated_input);

        return redirect()->route('data_siswa')->with('success', 'Data Siswa Berhasil Ditambahkan');
    }


    //menapilkan data admin dari tabel user dan Admin
    public function show($id){

        $data_siswa = Siswa::with(["user", "hasGuruPembimbing", "hasGuruPembimbing.User"])->where("id",$id)->first();

        if (!$data_siswa) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('pages.pagesadmin.detail_siswa', compact('data_siswa'));
    }



    public function delete($id)
    {
        // Temukan guru pembimbing berdasarkan ID menggunakan Eloquent
        $delete_siswa = Siswa::with(['User', 'User.Role'])->find($id);
        if (!$delete_siswa) {
            return redirect()->back()->with('error', 'Record not found');
        }



        // Hapus pengguna terkait
        $user_id = $delete_siswa->user->id; // Dapatkan ID pengguna
        User::where('id', $user_id)->delete(); // Hapus pengguna berdasarkan ID

        // Hapus data admin
        $delete_siswa->delete();

        // Redirect kembali ke halaman tabel admin setelah penghapusan.
        return redirect()->route('data_siswa')->with('success', 'Data Siswa Berhasil Dihapus!');
    }





    // public function edit($id)
    // {
    //     $update_siswa = Siswa::with(['User', 'User.Role', 'hasGuruPembimbing', 'hasGuruPembimbing.User'])->find($id);
    //     $guru_pembimbing = Guru_Pembimbing::with(['User', 'User.Role'])->get();

    //     if (!$update_siswa) {
    //         return redirect()->back()->with('error', 'Record not found');
    //     }

    //     return view('pages.pagesadmin.update_siswa', compact('update_siswa', 'guru_pembimbing'));
    // }

    public function edit($id)
    {
        $update_siswa = Siswa::with(['User', 'User.Role', 'hasGuruPembimbing', 'hasGuruPembimbing.User'])->find($id);

         // Mendapatkan ID guru pembimbing siswa
         $guru_pembimbing_id = $update_siswa->guru_pembimbing_id;

         // Mengambil data guru pembimbing yang terkait
         $guru_pembimbing = Guru_Pembimbing::with(['User', 'User.Role'])->get();

         return view('pages.pagesadmin.update_siswa', compact('update_siswa', 'guru_pembimbing'));
    }


    //update data siswa
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'guru_pembimbing_id' => 'required',
            'nisn' => 'required|string|max:25',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'nama_orangtua' => 'required|string|max:255',
            'no_hp_orangtua' => 'required|string|max:255',
            'gambar_profile' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // Make gambar_profile nullable to allow updating without changing the image
            // Add validation rules for other fields as needed
        ]);

        // Find the admin record by ID
        $update_siswa = Siswa::with('User')->find($id);

        if (!$update_siswa) {
            // Handle the case where the record is not found
            return redirect()->back()->with('error', 'Record not found');
        }

          // validate_tgl_lahir
          $tgl_lahir = $request->input('tgl_lahir');
          $now = Carbon::now();
          $birthDate = Carbon::parse($tgl_lahir);

          // Validasi tanggal lahir tidak boleh di masa depan
          if ($birthDate > $now) {
              return redirect()->back()->withErrors(['tgl_lahir' => 'Tanggal lahir tidak boleh melebihi tanggal sekarang']);
          }

          // Validasi umur minimal 15 tahun dan maksimal 19
          $minAge = 15;
          $maxAge = 19;
          $minDate = $now->copy()->subYears($maxAge);
          $maxDate = $now->copy()->subYears($minAge);

          if ($birthDate > $maxDate) {
              return redirect()->back()->withErrors(['tgl_lahir' => 'Umur siswa harus minimal 15 tahun.']);
          }

          if ($birthDate < $minDate) {
              return redirect()->back()->withErrors(['tgl_lahir' => 'Umur siswa harus maksimal 19 tahun.']);
          }

        // Update the admin's data
        $update_siswa->guru_pembimbing_id = $request->guru_pembimbing_id;
        $update_siswa->nisn = $request->nisn;
        $update_siswa->tempat_lahir = $request->tempat_lahir;
        $update_siswa->tgl_lahir = $request->tgl_lahir;
        $update_siswa->jenis_kelamin = $request->jenis_kelamin;
        $update_siswa->agama = $request->agama;
        $update_siswa->alamat = $request->alamat;
        $update_siswa->kelas = $request->kelas;
        $update_siswa->nama_orangtua = $request->nama_orangtua;
        $update_siswa->no_hp_orangtua = $request->no_hp_orangtua;




        // Save the admin's changes
        $update_siswa->save();

        // Update the associated user's data
        $update_siswa->User->name = $request->name;
        $update_siswa->User->email = $request->email;
        $update_siswa->User->no_hp = $request->no_hp;

        // Save the user's changes
        $update_siswa->User->save();

       // Handle updating the image if provided
       if ($request->hasFile('gambar_profile'))
       {
            $gambar = $request->file('gambar_profile');
            $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
            $path = 'dist/img/' . $fileName;

            // Simpan gambar baru
            file_put_contents($path, file_get_contents($gambar));

            // Setelah menyimpan gambar baru, Anda dapat menyimpan nama file ke dalam properti 'gambar_profile' di dalam database
            $update_siswa->User->gambar_profile = $fileName;

            // Simpan perubahan ke dalam database
            $update_siswa->User->save();
        }

        // Redirect back to the admin edit page with a success message
        return redirect()->route('data_siswa', $id)->with('success', 'Data Siswa record updated successfully.');
    }


    // surat kerapian untuk siswa
    public function SuratKerapian()
    {

        $suratKerapian = Surat_Kerapian::all();
        return view('pages.Surat', compact('suratKerapian'));
    }

    public function StoreSuratKerapian(Request $request)
    {

        $request->validate([
            'file_surat_kerapian' => 'required|mimes:pdf|max:2048',
        ]);

        try {
            $file_surat_kerapian = $request->file('file_surat_kerapian');
            $fileName = date('Y.m.d') . '_' . $file_surat_kerapian->getClientOriginalName();
            $path = 'dist/surat/' . $fileName;

            $file_surat_kerapian->move(public_path('dist/surat'), $fileName);

            $surat = new Surat_Kerapian();
            $surat->file_surat_kerapian = $fileName;
            $surat->id_siswa = auth()->user()->load('Siswa')->Siswa->id;
            $surat->save();

            return redirect()->back()->with('success', 'Surat kerapian berhasil diupload.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan surat kerapian.');
        }

    }

    // hapus untuk surat kerapian siswa
    public function destroy($id)
    {
        try {
            $surat = Surat_Kerapian::findOrFail($id);
            $surat->delete();

            return redirect()->back()->with('success', 'Surat kerapian berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus surat kerapian.');
        }
    }

    public function deleteSuratKerapian(Surat_Kerapian $surat_kerapian)
    {
        try {
            // Hapus file surat dari sistem penyimpanan
            $filePath = public_path('dist/surat/') . $surat_kerapian->file_surat_kerapian;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus data surat dari database
            $surat_kerapian->delete();

            return redirect()->back()->with('success', 'Surat Kerapian berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus surat.');
        }
    }

}
