<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TempatTrainingController;
use App\Http\Controllers\FormTempatTrainingController;
use App\Http\Controllers\DetailTempatTrainingController;
use App\Http\Controllers\DataDiriTempatTrainingController;
use App\Http\Controllers\UpdateTempatTrainingController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\ProfilePenggunaController;
//admin
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\controllers\DataPenggunaController;
use App\Http\controllers\DataGuruPembimbingController;
use App\Http\controllers\DataSiswaController;
use App\Http\controllers\DataAdminController;
use App\Http\controllers\DataSiswaBimbinganController;
use App\Http\controllers\DataLaporanController;
use App\Http\Controllers\KegiatanTrainingController;
use App\Http\Controllers\InterviewController;
use App\Models\Surat;



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// routes/web.php

Route::middleware(['block_register'])->get('/register', 'Auth\RegisteredUserController@create')->name('register');

Route::get('/', function () {
    return redirect()->route('login'); // Mengarahkan ke rute login
});


Route::post('/login', [LoginController::class, 'authenticate'])->name('login');



Route::post('/logout', function () {
    auth()->logout(); // Logout user
    return redirect('/login'); // Redirect to login page or any other desired page
})->name('logout')->middleware('auth');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //data TempatTrainigController
    Route::get('/tempattraining', [TempatTrainingController::class, 'index'])->name('tempattraining');
    Route::delete('/delete/{id}', [TempatTrainingController::class, 'delete'])->name('delete');
    Route::get('/formtempattraining', [FormTempatTrainingController::class, 'index'])->name('formtempattraining');
    Route::post('/formtempattraining', [FormTempatTrainingController::class, 'store'])->name('formtempatraining.store');
    Route::get('/detailtempattraining/{id}', [DetailTempatTrainingController::class, 'show'])->name('show');
    Route::get('/detailPilihanTempatTraining/{id}', [DetailTempatTrainingController::class, 'showPilihanTempatTraining'])->name('showPilihanTempatTraining');
    Route::get('/datadiritempattraining/{id}', [DetailTempatTrainingController::class, 'dataShow'])->name('dataShow');
    Route::get('/detailtempattraining', [DetailTempatTrainingController::class, 'index'])->name('detailtempattraining');
    // Route::get('/datadiritempattraining', [DataDiriTempatTrainingController::class, 'index'])->name('datadiritempattraining');
    Route::get('/updatetempattraining', [UpdateTempatTrainingController::class, 'index'])->name('updatetempattraining');


    //DataDiriTempatTrainingController
    Route::post('/tempattraining', [DataDiriTempatTrainingController::class, 'simpanPilihanTempat'])->name('tempattraining.simpanPilihanTempat');
    Route::get('/datadiritempattraining/{id}', [DataDiriTempatTrainingController::class, 'dataDiri'])->name('datadiritempattraining');


    //DataPenggunaController
    Route::get('pagesadmin/data_pengguna', [DataPenggunaController::class, 'index'])->name('data_pengguna');

    //profilepenggunacontroller
    Route::get('/profilepengguna', [ProfilePenggunaController::class, 'index'])->name('profilepengguna');
    Route::put('/profilepengguna/updateProfile', [ProfilePenggunaController::class, 'updateProfile'])->name('profilepengguna.updateProfile');



     // Data User UserRegisterController
     Route::get('/userregister', [UserRegisterController::class, 'showRegistrationForm'])->name('userregister');
     Route::post('/userregister/create', [UserRegisterController::class, 'registerUser'])->name('userregister.create');


    //Data UpdateTempatTrainingController
    Route::get('/edit{id}', [UpdateTempatTrainingController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [UpdateTempatTrainingController::class, 'update'])->name('update');


    //Data Siswa DataSiswaController
    Route::delete('/delete_siswa/{id}', [DataSiswaController::class, 'delete'])->name('delete_siswa');
    Route::get('pagesadmin/data_siswa', [DataSiswaController::class, 'index'])->name('data_siswa');
    Route::get('pagesadmin/tambah_data_siswa/{user}', [DataSiswaController::class, 'TambahDataSiswa'])->name('tambah_data_siswa');
    Route::post('/tambah_data_siswa/{user}', [DataSiswaController::class, 'store'])->name('tambah_data_siswa.store');
    Route::get('pagesadmin/detail_siswa/{id}', [DataSiswaController::class, 'show'])->name('detail_siswa');
    Route::get('/edit_siswa/{id}', [DataSiswaController::class, 'edit'])->name('edit_siswa');
    Route::put('/update_siswa/{id}', [DataSiswaController::class, 'update'])->name('update_siswa');
    Route::get('Surat', [DataSiswaController::class, 'SuratKerapian'])->name('Surat');
    Route::delete('/surat/{surat_kerapian}', [DataSiswaController::class, 'deleteSuratKerapian'])->name('Surat.deleteSuratKerapian');
    Route::post('/Surat', [DataSiswaController::class, 'StoreSuratKerapian'])->name('Surat.StoreSuratKerapian');
    Route::delete('/Surat/{id}', [DataSiswaController::class, 'destroy'])->name('Surat.destroy');


    //Data guru GuruPembimbingController
    Route::get('pagesadmin/data_guru_pembimbing', [DataGuruPembimbingController::class, 'index'])->name('data_guru_pembimbing');
    Route::get('pagesadmin/tambah_data_guru_pembimbing/{user}', [DataGuruPembimbingController::class, 'TambahDataGuruPembimbing'])->name('tambah_data_guru_pembimbing');
    Route::post('/tambah_data_guru_pembimbing/{user}', [DataGuruPembimbingController::class, 'store'])->name('tambah_data_guru_pembimbing.store');
    Route::delete('/delete_guru_pembimbing/{id}', [DataGuruPembimbingController::class, 'delete'])->name('delete_guru_pembimbing');
    Route::get('pagesadmin/detail_guru_pembimbing/{id}', [DataGuruPembimbingController::class, 'show'])->name('detail_guru_pembimbing');
    Route::get('/edit_guru_pembimbing/{id}', [DataGuruPembimbingController::class, 'edit'])->name('edit_guru_pembimbing');
    Route::put('/update_guru_pembimbing/{id}', [DataGuruPembimbingController::class, 'update'])->name('update_guru_pembimbing');
    Route::get('Surat', [DataGuruPembimbingController::class, 'Surat'])->name('Surat');
    Route::delete('/surat_pengantar_siswa/{surat}', [DataGuruPembimbingController::class, 'deleteSuratPengantar'])->name('surat_pengantar_siswa.deleteSuratPengantar');
    Route::post('surat_pengantar_siswa/{id_siswa}/{id_pilihan_tempat_training}', [DataGuruPembimbingController::class, 'StoreSurat'])->name('storesurat');





    //Data admin AdminController
    Route::get('pagesadmin/detail_admin/{id}', [DataAdminController::class, 'show'])->name('detail_admin');
    Route::get('pagesadmin/tambah_data_admin/{user}', [DataAdminController::class, 'TambahDataAdmin'])->name('tambah_data_admin');
    Route::post('/tambah_data_admin/{user}', [DataAdminController::class, 'store'])->name('tambah_data_admin.store');
    Route::delete('/delete_admin/{id}', [DataAdminController::class, 'delete'])->name('delete_admin');
    Route::get('pagesadmin/data_admin', [DataAdminController::class, 'index'])->name('data_admin');
    Route::get('/edit_admin/{id}', [DataAdminController::class, 'edit'])->name('edit_admin');
    Route::put('/update_admin/{id}', [DataAdminController::class, 'update'])->name('update_admin');


    //Data Siswa Bimbingan DataSiswaBimbinganController
    Route::get('/data_siswa_bimbingan', [DataSiswaBimbinganController::class, 'index'])->name('data_siswa_bimbingan');
    Route::get('/kelompok_bimbingan', [DataSiswaBimbinganController::class, 'kelompok_bimbingan'])->name('kelompok_bimbingan');
    Route::get('/detail_siswa_bimbingan/{id}', [DataSiswaBimbinganController::class, 'show'])->name('detail_siswa_bimbingan');



    //Data Laporan DataLaporanController
    Route::get('/validasi_laporan', [DataLaporanController::class, 'index'])->name('validasi_laporan');
    Route::put('/validasi_laporan/{id_siswa}/{id_tempat_training}/{id}/update', [DataLaporanController::class, 'validasiLaporanAkhir'])->name('validasi_laporan.validasiLaporanAkhir');
    Route::get('/data_laporan_monitoring', [DataLaporanController::class, 'laporan_monitoring'])->name('data_laporan_monitoring');
    Route::post('/data_laporan_monitoring/{id_siswa}/{id_tempat_training}/store', [DataLaporanController::class, 'StoreLaporanMonitoring'])->name('StoreLaporanMonitoring');
    Route::get('/surat_pengantar_siswa/{id}', [DataLaporanController::class, 'SuratPengantarSiswa'])->name('SuratPengantarSiswa');
    Route::get('/detail_laporan_monitoring/{id_siswa}', [DataLaporanController::class, 'detailLaporanMonitoring'])->name('detail_laporan_monitoring');



    //data kegiatan training
    Route::get('kegiatan_training', [KegiatanTrainingController::class, 'index'])->name('kegiatan_training');
    // Route::post('/kegiatan_training/{id_siswa}/{id_tempat_training}', [KegiatanTrainingController::class, 'StoreLaporan'])->name('StoreLaporan');
    // Route::post('/kegiatan_training/{id_siswa}/{id_tempat_training}', [KegiatanTrainingcontroller::class, 'TambahLaporanAkhir'])->name('TambahLaporanAkhir');
    Route::post('/kegiatan_training/{id_siswa}/{id_tempat_training}/store', [KegiatanTrainingController::class, 'StoreLaporan'])->name('StoreLaporan');
    Route::post('/kegiatan_training/{id_siswa}/{id_tempat_training}/akhir', [KegiatanTrainingController::class, 'TambahLaporanAkhir'])->name('TambahLaporanAkhir');
    Route::get('/detail_laporan_mingguan', [KegiatanTrainingController::class, 'detailLaporanMingguan'])->name('detail_laporan_mingguan');
    Route::put('/detail_laporan_mingguan/{id_siswa}/{id_tempat_training}/{id}/update', [KegiatanTrainingController::class, 'UpdateLaporanMingguan'])->name('detail_laporan_mingguan.UpdateLaporanMingguan');
    Route::get('/laporan_siswa{id_siswa}', [KegiatanTrainingController::class, 'laporanSiswa'])->name('laporan_siswa');
    Route::put('/laporan_siswa/{id_siswa}/{id_tempat_training}/{id}/update', [KegiatanTrainingController::class, 'validasiLaporanMingguan'])->name('laporan_siswa.validasiLaporanMingguan');

    //data interview
    Route::get('/jadwal_interview', [InterviewController::class, 'jadwal_interview'])->name('jadwal_interview');
    Route::post('/jadwal_interview/{id_siswa}/{id_tempat_training}', [InterviewController::class, 'StoreInterview'])->name('StoreInterview');
    Route::delete('/jadwal_interview/{hasil_interview}', [InterviewController::class, 'deleteHasilInterview'])->name('jadwal_interview.deleteHasilInterview');

    Route::get('hasil_interview', [interviewController::class, 'hasil_interview'])->name('hasil_interview');
    Route::put('hasil_interview/{id_siswa}/{id_tempat_training}/{id}/update', [InterviewController::class, 'updateInterview'])->name('hasil_interview.updateInterview');






});






require __DIR__.'/auth.php';
