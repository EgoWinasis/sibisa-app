<?php

use App\Http\Controllers\Siswa;
use App\Http\Controllers\Kelas;
use App\Http\Controllers\Nilai;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('profile', ProfileController::class)->middleware('auth');
Route::get('/foo', function () {
    Artisan::call('storage:link');
});
// user
Route::resource('user', UserController::class)->middleware('auth');
// password
Route::resource('password', PasswordController::class)->middleware('auth');


Route::group(['middleware' => 'profile.check'], function () {
    // route master data siswa
    Route::resource('siswa', \App\Http\Controllers\Siswa::class)->middleware('auth');
    // route master data guru
    // Route::resource('guru', \App\Http\Controllers\Guru::class)->middleware('auth');
    // route kelas
    Route::resource('kelas', \App\Http\Controllers\Kelas::class)->middleware('auth');
    // route nilai
    Route::resource('nilai', \App\Http\Controllers\Nilai::class)->middleware('auth');

    Route::resource('kompetensi', \App\Http\Controllers\Kompetensi::class)->middleware('auth');
    Route::resource('ijazah', \App\Http\Controllers\Ijazah::class)->middleware('auth');
    // tahun ajaran
    Route::resource('tahunajaran', \App\Http\Controllers\TahunAjaranController::class)->middleware('auth');
    // guru
    Route::resource('aturguru', \App\Http\Controllers\SettingGuruController::class)->middleware('auth');
    // siswa
    Route::resource('atursiswa', \App\Http\Controllers\SettingSiswaController::class)->middleware('auth');
    // siswa Aktif
    Route::resource('siswaaktif', \App\Http\Controllers\SiswaAktifController::class)->middleware('auth');
    // nilai Aktif
    Route::resource('nilaiaktif', \App\Http\Controllers\NilaiAktifController::class)->middleware('auth');
    // kelas Aktif
    Route::resource('kelasaktif', \App\Http\Controllers\KelasAktifController::class)->middleware('auth');


    // Route::get('/getNilai', [App\Http\Controllers\AjaxController::class, 'getNilai'])->name('getNilai');
    // set Kelas
    Route::get('/setKelas/{id}/{kelas}', [App\Http\Controllers\AjaxController::class, 'setKelas'])->name('setKelas');
    // cetak
    Route::get('/cetak', [App\Http\Controllers\cetakController::class, 'index'])->name('cetak')->middleware('auth');
    Route::get('/cetak/nilai/{id}', [App\Http\Controllers\cetakController::class, 'nilai'])->name('cetak.nilai')->middleware('auth');
    Route::get('/cetak/cover', [App\Http\Controllers\cetakController::class, 'cover'])->name('cetak.cover')->middleware('auth');
    Route::get('/cetak/biodata/{id}', [App\Http\Controllers\cetakController::class, 'biodata'])->name('cetak.biodata')->middleware('auth');
    Route::get('/cetak/kompetensi/{id}', [App\Http\Controllers\cetakController::class, 'kompetensi'])->name('cetak.kompetensi')->middleware('auth');
    Route::get('/cetak/ijazah/{id}', [App\Http\Controllers\cetakController::class, 'ijazah'])->name('cetak.ijazah')->middleware('auth');
    Route::get('/cetak/skl/{id}', [App\Http\Controllers\cetakController::class, 'skl'])->name('cetak.skl')->middleware('auth');
    Route::get('/cetak/skhun/{id}', [App\Http\Controllers\cetakController::class, 'skhun'])->name('cetak.skhun')->middleware('auth');

    // about
    Route::get('/about', function () {
        return view('about');
    })->name('about')->middleware('auth');
});
