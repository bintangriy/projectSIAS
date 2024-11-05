<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\Datasiswa1Controller;
use App\Http\Controllers\Datasiswa2Controller;
use App\Http\Controllers\DataguruController;
use App\Http\Controllers\AdminpageController;
use App\Http\Controllers\GurupageController;
use App\Http\Controllers\Auth\Login1Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AllabsensiController;
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


Route::get('/gurufront', function () {
    return view('gurupage.frontend');
});
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
});

Route::middleware(['auth', 'CheckRole:guru'])->group(function () {
    Route::get('/gurupage', [GurupageController::class, 'index'])->name('gurupage.index');
    Route::resource('/datasiswa1', \App\Http\Controllers\Datasiswa1Controller::class);
});

Route::middleware(['auth', 'CheckRole:siswa'])->group(function () {
    Route::get('/siswapage', [SiswapageController::class, 'index'])->name('siswapage.index');
    Route::resource('/datasiswa2', \App\Http\Controllers\Datasiswa2Controller::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/absensi', AbsensiController::class);
});


require __DIR__ . '/auth.php';
