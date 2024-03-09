<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TempatTrainingController;
use App\Http\Controllers\FormTempatTrainingController;
use App\Http\Controllers\DetailTempatTrainingController;
use App\Http\Controllers\DataDiriTempatTrainingController;
use App\Http\Controllers\UpdateTempatMagangController;
use App\Http\Controllers\AkunGuruController;
use App\Http\Controllers\AkunSiswaController;
use App\Http\Controllers\AkunAdminController;
use App\Http\Controllers\FormAkunGuruController;
use App\Http\Controllers\FormAkunSiswaController;
use App\Http\Controllers\FormAkunAdminController;
use App\Http\Controllers\UpdateAkunGuruController;
use App\Http\Controllers\UpdateAkunSiswaController;
use App\Http\Controllers\UpdateAkunAdminController;
use App\Http\Controllers\DetailAkunGuruController;
use App\Http\Controllers\DetailAkunSiswaController;
use App\Http\Controllers\DetailAkunAdminController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;




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

    //tempatmagang
    Route::get('/tempattraining', [TempatTrainingController::class, 'index'])->name('tempattraining');

    Route::get('/formtempattraining', [FormTempatTrainingController::class, 'index'])->name('formtempattraining');
    Route::post('/formtempattraining', [FormTempatTrainingController::class, 'store'])->name('formtempatraining.store');
    Route::get('/detailtempattraining', [DetailTempatTrainingController::class, 'index'])->name('detailtempattraining');
    Route::get('/datadiritempattraining', [DataDiriTempatTrainingController::class, 'index'])->name('datadiritempattraining');
    Route::get('/updatetempatmagang', [UpdateTempatMagangController::class, 'index'])->name('updatetempatmagang');


    Route::delete('/delete/{id}', [TempatTrainingController::class, 'delete'])->name('delete');

    //admin
    Route::get('pagesadmin/akunguru', [AkunGuruController::class, 'index'])->name('akunguru');
    Route::get('pagesadmin/akunsiswa', [AkunSiswaController::class, 'index'])->name('akunsiswa');
    Route::get('pagesadmin/akunadmin', [AkunAdminController::class, 'index'])->name('akunadmin');
    Route::get('pagesadmin/formakunguru', [FormAkunGuruController::class, 'index'])->name('formakunguru');
    Route::get('pagesadmin/formakunsiswa', [FormAkunSiswaController::class, 'index'])->name('formakunsiswa');
    Route::get('pagesadmin/formakunadmin', [FormAkunAdminController::class, 'index'])->name('formakunadmin');
    Route::get('pagesadmin/updateakunguru', [UpdateAkunGuruController::class, 'index'])->name('updateakunguru');
    Route::get('pagesadmin/updateakunsiswa', [UpdateAkunSiswaController::class, 'index'])->name('updateakunsiswa');
    Route::get('pagesadmin/updateakunadmin', [UpdateAkunAdminController::class, 'index'])->name('updateakunadmin');
    Route::get('pagesadmin/detailakunguru', [DetailAkunGuruController::class, 'index'])->name('detailakunguru');
    Route::get('pagesadmin/detailakunsiswa', [DetailAkunSiswaController::class, 'index'])->name('detailakunsiswa');
    Route::get('pagesadmin/detailakunadmin', [DetailAkunAdminController::class, 'index'])->name('detailakunadmin');

    // Display registration form
    Route::get('/userregister', [UserRegisterController::class, 'showRegistrationForm'])->name('userregister');

    // Handle user registration
    Route::post('/userregister', [UserRegisterController::class, 'registerUser']);





});






require __DIR__.'/auth.php';
