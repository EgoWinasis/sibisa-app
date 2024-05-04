<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
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


Route::get('/login-wali', [App\Http\Controllers\WaliController::class, 'login'])->name('login.wali');
Route::post('/auth-wali', [App\Http\Controllers\WaliController::class, 'authLogin'])->name('auth.wali');

Route::get('/dashboard-wali', [App\Http\Controllers\WaliController::class, 'index'])
    ->name('home.wali')
    ->middleware('waliauth');
Route::get('/presensi-wali', [App\Http\Controllers\WaliController::class, 'presensi'])
    ->name('presensi.wali')
    ->middleware('waliauth');
Route::get('/tentang-wali', function () {
    return view('wali.about');
})
    ->name('tentang.wali')
    ->middleware('waliauth');
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
// reset password

Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');

Route::group(['middleware' => 'profile.check'], function () {
    // wali users
    Route::get('/users-wali', [App\Http\Controllers\WaliController::class, 'usersWali'])->name('users.wali')->middleware('auth');
    Route::post('/create-wali-user', [App\Http\Controllers\WaliController::class, 'createWaliUser'])->name('create.wali.user')->middleware('auth');;
    Route::put('/update-wali-user', [App\Http\Controllers\WaliController::class, 'updateWaliUser'])->name('update.wali.user')->middleware('auth');;

    // route master data siswa
    Route::get('/siswa/angkatan/{tahunAjaran}', [\App\Http\Controllers\Siswa::class, 'dataAngkatan'])->name('angkatan.siswa')->middleware('auth');
    Route::resource('siswa', \App\Http\Controllers\Siswa::class)->middleware('auth');
    Route::put('/update-siswa/{id}', [App\Http\Controllers\AjaxController::class, 'updateStatus'])->name('update.siswa');
    // route kelas
    Route::post('/hadir-semua', [\App\Http\Controllers\PrensensiController::class, 'hadirSemua'])->name('hadir.semua');
    Route::resource('presensi', \App\Http\Controllers\PrensensiController::class)->middleware('auth');
    // route master data guru
    Route::put('/update-guru/{id}', [App\Http\Controllers\GuruController::class, 'updateStatus'])->name('update.guru');
    Route::resource('guru', \App\Http\Controllers\GuruController::class)->middleware('auth');
    // route kelas
    Route::resource('kelas', \App\Http\Controllers\Kelas::class)->middleware('auth');
    // route nilai
    Route::resource('nilai', \App\Http\Controllers\Nilai::class)->middleware('auth');
    // ajax nilai update
    Route::post('/update-pancasila', [\App\Http\Controllers\AjaxNilaiController::class, 'UpdatePancasila'])->name('update.pancasila');
    Route::post('/update-pengetahuan', [\App\Http\Controllers\AjaxNilaiController::class, 'UpdatePengetahuan'])->name('update.pengetahuan');
    Route::post('/update-ekstrakulikuler', [\App\Http\Controllers\AjaxNilaiController::class, 'UpdateEkstrakulikuler'])->name('update.ekstrakulikuler');
    Route::post('/update-prestasi', [\App\Http\Controllers\AjaxNilaiController::class, 'UpdatePrestasi'])->name('update.prestasi');
    Route::post('/update-ketidakhadiran', [\App\Http\Controllers\AjaxNilaiController::class, 'UpdateKetidakhadiran'])->name('update.ketidakhadiran');
    Route::post('/update-kenaikan', [\App\Http\Controllers\AjaxNilaiController::class, 'UpdateKenaikan'])->name('update.kenaikan');
    Route::post('/update-ttd', [\App\Http\Controllers\AjaxNilaiController::class, 'UpdateTtd'])->name('update.ttd');
    Route::resource('kompetensi', \App\Http\Controllers\Kompetensi::class)->middleware('auth');
    Route::resource('ijazah', \App\Http\Controllers\Ijazah::class)->middleware('auth');
    // tahun ajaran
    Route::resource('tahunajaran', \App\Http\Controllers\TahunAjaranController::class)->middleware('auth');
    // guru
    Route::resource('aturguru', \App\Http\Controllers\SettingGuruController::class)->middleware('auth');
    // siswa
    Route::get('atursiswa/manual', [\App\Http\Controllers\SettingSiswaController::class, 'manual'])->name('atursiswa.manual')->middleware('auth');
    Route::post('atursiswa/storeManual', [\App\Http\Controllers\SettingSiswaController::class, 'storeManual'])->name('atursiswa.storeManual')->middleware('auth');
    Route::resource('atursiswa', \App\Http\Controllers\SettingSiswaController::class)->middleware('auth');
    // sekolah
    Route::resource('sekolah', \App\Http\Controllers\SekolahController::class)->middleware('auth');
    // siswa Aktif
    Route::resource('siswaaktif', \App\Http\Controllers\SiswaAktifController::class)->middleware('auth');
    // nilai Aktif
    Route::resource('nilaiaktif', \App\Http\Controllers\NilaiAktifController::class)->middleware('auth');
    // kelas Aktif
    Route::resource('kelasaktif', \App\Http\Controllers\KelasAktifController::class)->middleware('auth');
    // otorisasi password
    Route::resource('otorisasi-password', \App\Http\Controllers\OtorisasiPasswordController::class)->middleware('auth');

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
