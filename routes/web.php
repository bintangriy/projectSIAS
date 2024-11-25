<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdduserController;
use app\Http\Controllers\ProfilesisController;
use App\Http\Controllers\AbsensiswaController;
use App\Http\Controllers\AbsensiswagurupageController;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\NewsguruController;
use App\Http\Controllers\NewssiswaController;
use App\Http\Controllers\Datasiswa1Controller;
use App\Http\Controllers\Datasiswa2Controller;
use App\Http\Controllers\DataguruController;
use App\Http\Controllers\DatakelasController;
use App\Http\Controllers\AdminpageController;
use App\Http\Controllers\GurupageController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\Auth\Login1Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AllabsensiController;
use App\Http\Controllers\AbsensiroleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SiswapageController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/**Auth::routes();

Route::get('login', [Login1Controller::class, 'showLoginForm'])->name('login');
Route::post('login', [Login1Controller::class, 'login']);
Route::post('logout', [Login1Controller::class, 'logout'])->name('logout');
 */

Route::get('/', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    auth::logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/datasiswa', function () {
//  return view('adminpage.datasiswa');
//});

//Route::get('/dataguru', function () {
//    return view('adminpage.dataguru');
//});

Route::middleware([CheckRole::class])->group(function () {
    Auth::routes();
});

Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
    Route::get('/adminpage', [AdminpageController::class, 'index'])->name('adminpage.index');

    Route::resource('/dataguru', \App\Http\Controllers\DataguruController::class);
    Route::resource('/datasiswa', \App\Http\Controllers\DatasiswaController::class);
    Route::resource('/adduser', AdduserController::class);


    route::get('/dataguru/create', [DataguruController::class, 'create'])->name('dataguru.create');
    route::post('/dataguru/store', [DataguruController::class, 'store'])->name('dataguru.store');
    route::get('/dataguru/edit/{dataguru}', [DataguruController::class, 'edit'])->name('dataguru.edit');
    route::put('/dataguru/update/{dataguru}', [DataguruController::class, 'update'])->name('dataguru.update');
    route::delete('/dataguru/delete/{dataguru}', [DataguruController::class, 'destroy'])->name('dataguru.destroy');

    route::get('/datasiswa/create', [DatasiswaController::class, 'create'])->name('datasiswa.create');
    route::post('/datasiswa/store', [DatasiswaController::class, 'store'])->name('datasiswa.store');
    route::get('/datasiswa/edit/{datasiswa}', [DatasiswaController::class, 'edit'])->name('datasiswa.edit');
    route::put('/datasiswa/update/{datasiswa}', [DatasiswaController::class, 'update'])->name('datasiswa.update');
    route::delete('/datasiswa/delete/{datasiswa}', [DatasiswaController::class, 'destroy'])->name('datasiswa.destroy');

    Route::resource('/dataabsensi', AllabsensiController::class);
    Route::get('/absensiguru', [AbsensiroleController::class, 'absensiGuru'])->name('absen.absenguru');
    Route::get('/absensisiswa', [AbsensiroleController::class, 'absensiSiswa'])->name('absen.absensiswa');

    Route::get('/addusers/create', [AdduserController::class, 'create'])->name('adduser.create');
    Route::post('/adduser', [AdduserController::class, 'store'])->name('adduser.store');
    route::get('/adduser/edit/{users}', [AdduserController::class, 'edit'])->name('adduser.edit');
    route::put('/adduser/update/{users}', [AdduserController::class, 'update'])->name('adduser.update');
    route::delete('/adduser/delete/{users}', [AdduserController::class, 'destroy'])->name('adduser.destroy');

    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');

    Route::resource('datakelas', DatakelasController::class);
    Route::get('/datakelas/edit/{datakelas}', [DatakelasController::class, 'edit'])->name('datakelas.edit');
    Route::put('/datakelas/update/{datakelas}', [DatakelasController::class, 'update'])->name('datakelas.update');
    Route::delete('/datakelas/delete/{datakelas}', [DatakelasController::class, 'destroy'])->name('datakelas.destroy');

    Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
    Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
    Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
    Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
    Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');
    Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
});

Route::middleware(['auth', 'CheckRole:guru'])->group(function () {
    Route::get('/gurupage', [GurupageController::class, 'index'])->name('gurupage.index');
    Route::resource('/datasiswa1', \App\Http\Controllers\Datasiswa1Controller::class);
    Route::get('/materiupload', [MateriController::class, 'create'])->name('materi.create');

    Route::get('/newsguru', [NewsguruController::class, 'index'])->name('newsguru.index');
    Route::get('/newsguru{id}', [NewsguruController::class, 'show'])->name('newsguru.show');


    Route::get('/absensi_siswa', [AbsensiswagurupageController::class, 'absensiswa']);
});

Route::middleware(['auth', 'CheckRole:siswa'])->group(function () {
    Route::get('/siswapage', [SiswapageController::class, 'index'])->name('siswapage.index');
    Route::resource('/datasiswa2', \App\Http\Controllers\Datasiswa2Controller::class);

    Route::get('/profilesis', [\App\Http\Controllers\ProfilesisController::class, 'edit'])->name('profile.editsiswa');
    Route::patch('/profilesis', [\App\Http\Controllers\ProfilesisController::class, 'update'])->name('profile.update');
    Route::delete('/profilesis', [\App\Http\Controllers\ProfilesisController::class, 'destroy'])->name('profile.destroy');

    Route::get('/newssiswa', [NewssiswaController::class, 'index'])->name('newssiswa.index');
    Route::get('/newssiswa{id}', [NewssiswaController::class, 'show'])->name('newssiswa.show');


    Route::resource('/absensiswa', AbsensiswaController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::get('/materi/download/{id}', [MateriController::class, 'download'])->name('materi.download');

    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');


    Route::resource('/absensi', AbsensiController::class);
    Route::resource('/materi', MateriController::class);
});


require __DIR__ . '/auth.php';
