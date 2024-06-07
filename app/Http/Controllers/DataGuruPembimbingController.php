<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guru_Pembimbing;
use App\Models\Surat;
use App\Models\Siswa;
use App\Models\Surat_Kerapian;
use App\Models\Tempat_Training;
use App\Models\Pilihan_Tempat_Training;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DataGuruPembimbingController extends Controller
{
    public function index()
    {
        $data_GuruPembimbing = Guru_Pembimbing::with(['User', 'User.Role'])->paginate(5);

        return view('pages.pagesadmin.data_guru_pembimbing', compact('data_GuruPembimbing'));
    }

    public function TambahDataGuruPembimbing(User $user)
    {
        if(!$user){
            return redirect()->route('userregister')->with('error', 'Data gagal ditambahkan.');

        }

        return view('pages.pagesadmin.tambah_data_guru_pembimbing', compact('user'));
    }

    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'wali_kelas' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        // //upload gambar
        // $gambar = $request->file('gambar_profile');
        // $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
        // $path = 'dist/img/' . $fileName;

        // file_put_contents($path, file_get_contents($gambar));

        $validated_input = $validator->validated();

        // Menyimpan user_id
        $validated_input['user_id'] = auth()->user()->id;

        // // Menyimpan gambar
        // $validated_input['gambar_profile'] = $fileName;

       // Menyimpan data
        $user->Guru_Pembimbing()->create($validated_input);
        return redirect()->route('data_guru_pembimbing')->with('success', 'Data Guru Berhasil Ditambahkan');
    }

    //menapilkan data guru pembimbing dari tabel admins
    public function show($id){

        $data_guru_pembimbing = Guru_Pembimbing::with(["user"])->where("id",$id)->first();


        if (!$data_guru_pembimbing) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('pages.pagesadmin.detail_guru_pembimbing', compact('data_guru_pembimbing'));
    }

    public function delete($id)
    {
        // Temukan guru pembimbing berdasarkan ID menggunakan Eloquent
        $delete_guru_pembimbing = Guru_Pembimbing::with(['User', 'User.Role'])->find($id);
        if (!$delete_guru_pembimbing) {
            return redirect()->back()->with('error', 'Record not found');
        }

        // Hapus pengguna terkait
        $user_id = $delete_guru_pembimbing->user->id; // Dapatkan ID pengguna
        User::where('id', $user_id)->delete(); // Hapus pengguna berdasarkan ID

        // Hapus guru pembimbing
        $delete_guru_pembimbing->delete();

        // Redirect kembali ke halaman tabel guru pembimbing setelah penghapusan.
        return redirect()->route('data_guru_pembimbing')->with('success', 'Guru Pembimbing deleted successfully!');
    }


    //update data guru pembimbing
    public function edit($id)
    {
        $update_guru_pembimbing = Guru_Pembimbing::with(['User', 'User.Role'])->find($id);
        if (!$update_guru_pembimbing) {
            return redirect()->back()->with('error', 'Record not found');
        }

        return view('pages.pagesadmin.update_guru_pembimbing', compact('update_guru_pembimbing'));
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'wali_kelas' => 'required|string|max:255',
            'gambar_profile' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // Make gambar_profile nullable to allow updating without changing the image
            // Add validation rules for other fields as needed
        ]);

        // Find the admin record by ID
        $update_guru_pembimbing = Guru_Pembimbing::with('User')->find($id);

        if (!$update_guru_pembimbing) {
            // Handle the case where the record is not found
            return redirect()->back()->with('error', 'Record not found');
        }

        // Update the admin's data
        $update_guru_pembimbing->tempat_lahir = $request->tempat_lahir;
        $update_guru_pembimbing->tgl_lahir = $request->tgl_lahir;
        $update_guru_pembimbing->jenis_kelamin = $request->jenis_kelamin;
        $update_guru_pembimbing->agama = $request->agama;
        $update_guru_pembimbing->alamat = $request->alamat;
        $update_guru_pembimbing->wali_kelas = $request->wali_kelas;


        // Save the admin's changes
        $update_guru_pembimbing->save();

        // Update the associated user's data
        $update_guru_pembimbing->User->name = $request->name;
        $update_guru_pembimbing->User->email = $request->email;
        $update_guru_pembimbing->User->no_hp = $request->no_hp;

        // Save the user's changes
        $update_guru_pembimbing->User->save();

        // Handle updating the image if provided
        if ($request->hasFile('gambar_profile')) {
            $gambar = $request->file('gambar_profile');
            $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
            $path = 'dist/img/' . $fileName;

            // Simpan gambar baru
            file_put_contents($path, file_get_contents($gambar));

            // Setelah menyimpan gambar baru, Anda dapat menyimpan nama file ke dalam properti 'gambar_profile' di dalam database
            $update_guru_pembimbing->User->gambar_profile = $fileName;

            // Simpan perubahan ke dalam database
            $update_guru_pembimbing->User->save();
        }

        // Redirect back to the admin edit page with a success message
        return redirect()->route('data_guru_pembimbing', $id)->with('success', 'Guru pembimbing record updated successfully.');
    }


    //untuk surat pengantar
    public function Surat (Request $request)
    {
        $auth_login = $request->user()->load("Guru_Pembimbing","Siswa");

        if($auth_login->Guru_Pembimbing){
            $guru_pembimbing_id = $auth_login->Guru_Pembimbing->id;

            $siswas = Siswa::with(['user', 'hasSuratKerapian'])
            ->where('guru_pembimbing_id', $guru_pembimbing_id)
            ->paginate(2);

            $daftar_surat_pengantar_siswa = Siswa::has('hasPilihanTempatTraining')->with([
                'hasPilihanTempatTraining'
            ])->whereGuruPembimbingId($guru_pembimbing_id)->get();


            return view('pages.Surat', compact('siswas','daftar_surat_pengantar_siswa'));
        }

        $surats = Surat::where('id_siswa', $auth_login->Siswa->id)
                ->with('siswa.user', 'tempatTraining')
                ->get();

        $suratKerapian = Surat_Kerapian::where('id_siswa',$auth_login->Siswa->id)->first();

        return view('pages.Surat', compact('surats', 'suratKerapian'));

    }

    public function StoreSurat(Request $request, $id_siswa, $id_pilihan_tempat_training)
    {
        // Validasi input
    $request->validate([
        'file_surat_pengantar' => 'required|mimes:pdf|max:2048',
    ]);

    // Dapatkan ID guru pembimbing dari user
    $guru_pembimbing_id = $request->user()->Guru_Pembimbing->id;

    // Periksa apakah siswa terkait dengan guru pembimbing dan memiliki pilihan tempat training
    $siswa = Siswa::where('id', $id_siswa)
                ->where('guru_pembimbing_id', $guru_pembimbing_id)
                ->whereHas('pilihanTempatTraining', function($query) use ($id_pilihan_tempat_training) {
                    $query->where('id_tempat_Training', $id_pilihan_tempat_training);
                })
                ->first();

        try {
            $file_surat_pengantar = $request->file('file_surat_pengantar');
            $fileName = date('Y.m.d') . '_' . $file_surat_pengantar->getClientOriginalName();
            $path = 'dist/surat/' . $fileName;

            // Pindahkan file ke direktori tujuan
            $file_surat_pengantar->move(public_path('dist/surat'), $fileName);

            // Simpan data surat ke database
            $surat = new Surat();
            $surat->id_siswa = $siswa->id;
            $surat->id_pilihan_tempat_training = $id_pilihan_tempat_training;
            $surat->file_surat_pengantar = $fileName;
            $surat->save();

            return redirect()->back()->with('success', 'Surat pengantar berhasil ditambahkan');
        } catch (\Exception $e) {
            \Log::error('Error storing surat: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan surat.');
        }
    }


    //delete surat pengantar
    public function deleteSuratPengantar(Surat $surat)
    {
        try {
            // Hapus file surat dari sistem penyimpanan
            $filePath = public_path('dist/surat/') . $surat->file_surat_pengantar;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus data surat dari database
            $surat->delete();

            return redirect()->back()->with('success', 'Surat berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Error deleting surat: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus surat.');
        }
    }








}
