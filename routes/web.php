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
    Route::get('/datadiritempattraining', [DataDiriTempatTrainingController::class, 'index'])->name('datadiritempattraining');
    Route::get('/updatetempattraining', [UpdateTempatTrainingController::class, 'index'])->name('updatetempattraining');




    //admin
    Route::get('pagesadmin/data_pengguna', [DataPenggunaController::class, 'index'])->name('data_pengguna');

    //profilepenggunacontroller
    Route::get('/profilepengguna', [ProfilePenggunaController::class, 'index'])->name('profilepengguna');

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


    //Data guru GuruPembimbingController
    Route::get('pagesadmin/data_guru_pembimbing', [DataGuruPembimbingController::class, 'index'])->name('data_guru_pembimbing');
    Route::get('pagesadmin/tambah_data_guru_pembimbing/{user}', [DataGuruPembimbingController::class, 'TambahDataGuruPembimbing'])->name('tambah_data_guru_pembimbing');
    Route::post('/tambah_data_guru_pembimbing/{user}', [DataGuruPembimbingController::class, 'store'])->name('tambah_data_guru_pembimbing.store');
    Route::delete('/delete_guru_pembimbing/{id}', [DataGuruPembimbingController::class, 'delete'])->name('delete_guru_pembimbing');
    Route::get('pagesadmin/detail_guru_pembimbing/{id}', [DataGuruPembimbingController::class, 'show'])->name('detail_guru_pembimbing');
    Route::get('/edit_guru_pembimbing/{id}', [DataGuruPembimbingController::class, 'edit'])->name('edit_guru_pembimbing');
    Route::put('/update_guru_pembimbing/{id}', [DataGuruPembimbingController::class, 'update'])->name('update_guru_pembimbing');


    //Data admin AdminController
    Route::get('pagesadmin/detail_admin/{id}', [DataAdminController::class, 'show'])->name('detail_admin');
    Route::get('pagesadmin/tambah_data_admin/{user}', [DataAdminController::class, 'TambahDataAdmin'])->name('tambah_data_admin');
    Route::post('/tambah_data_admin/{user}', [DataAdminController::class, 'store'])->name('tambah_data_admin.store');
    Route::delete('/delete_admin/{id}', [DataAdminController::class, 'delete'])->name('delete_admin');
    Route::get('pagesadmin/data_admin', [DataAdminController::class, 'index'])->name('data_admin');
    Route::get('/edit_admin/{id}', [DataAdminController::class, 'edit'])->name('edit_admin');
    Route::put('/update_admin/{id}', [DataAdminController::class, 'update'])->name('update_admin');






});






require __DIR__.'/auth.php';
