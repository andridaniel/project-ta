<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $role= Role::all();
        return view('pages.userregister', compact('role'));
    }

    public function registerUser(Request $request)
    {

        $request->validate([
            'role_id' => 'required',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required|numeric',
            'gambar_profile' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|confirmed|min:8',
        ]);

        $requestData = [
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ];

         //upload gambar
         $gambar = $request->file('gambar_profile');
         $fileName = date('Y.m.d') . $gambar->getClientOriginalName();
         $path = 'dist/img/' . $fileName;

         file_put_contents($path, file_get_contents($gambar));

         // Menyimpan gambar
         $requestData['gambar_profile'] = $fileName;


        // Create a new user instance

        $user = User::create($requestData);

        if(!$user){
            return \redirect()->back()->with('error', 'Data gagal ditambahkan.');
        }

        switch($user->role_id){
            case 1:
                return to_route('tambah_data_admin', $user);
                // $user->Admin()->create([
                //     "tempat_lahir" => fake()->city(),
                //     "tgl_lahir" => fake()->date(),
                //     "jenis_kelamin" => fake()->randomElement(['Laki-laki', 'Perempuan']),
                //     "agama" => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                //     "alamat" => fake()->address(),
                //     "gambar_profile" => fake()->imageUrl(),
                // ]);
                break;
            case 2:
                return to_route('tambah_data_guru_pembimbing', $user);
                // $user->Guru_Pembimbing()->create([
                //     "tempat_lahir" => fake()->city(),
                //     "tgl_lahir" => fake()->date(),
                //     "jenis_kelamin" => fake()->randomElement(['Laki-laki', 'Perempuan']),
                //     "agama" => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                //     "alamat" => fake()->address(),
                //     "wali_kelas" => fake()->name(),
                //     "gambar_profile" => fake()->imageUrl(),
                // ]);
                break;
            case 3:
                return to_route('tambah_data_siswa', $user);
                // $user->Siswa()->create([
                //     "nisn" => fake()->randomNumber(8),
                //     "tempat_lahir" => fake()->city(),
                //     "tgl_lahir" => fake()->date(),
                //     "jenis_kelamin" => fake()->randomElement(['Laki-laki', 'Perempuan']),
                //     "agama" => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                //     "alamat" => fake()->address(),
                //     "kelas" => fake()->randomElement(['X', 'XI', 'XII']),
                //     "nama_orangtua" => fake()->name(),
                //     "no_hp_orangtua" => fake()->phoneNumber(),
                //     "gambar_profile" => fake()->imageUrl(),
                // ]);
                break;
            default:
            break;
        }


        // Redirect or perform other actions as needed
        return redirect()->route('userregister')->with('success', 'Data telah berhasil ditambahkan.');
    }
}
