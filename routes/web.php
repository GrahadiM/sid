<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => false,
    'confirm'  => false,
    'verify'   => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('admin/')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('announcement', App\Http\Controllers\Admin\AnnouncementController::class);
    Route::resource('messages', App\Http\Controllers\Admin\MessageController::class);
    // Route::resource('histories', App\Http\Controllers\Admin\HistoryController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});

Route::middleware(['auth'])->prefix('staff/')->name('staff.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Staff\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('announcement', App\Http\Controllers\Staff\AnnouncementController::class);
    Route::resource('messages', App\Http\Controllers\Staff\MessageController::class);
    Route::resource('penduduk', App\Http\Controllers\Staff\PendudukController::class);
    Route::resource('kartu_keluarga', App\Http\Controllers\Staff\KartuKeluargaController::class);
    Route::resource('anggota', App\Http\Controllers\Staff\AnggotaKeluargaController::class);
    Route::resource('data_lahir', App\Http\Controllers\Staff\LahirController::class);
    Route::resource('data_meninggal', App\Http\Controllers\Staff\MeninggalController::class);
    Route::resource('data_pendatang', App\Http\Controllers\Staff\PendatangController::class);
    Route::resource('data_pindah', App\Http\Controllers\Staff\PindahController::class);
    Route::resource('submission_letter', App\Http\Controllers\Staff\PengajuanSuratController::class);
    Route::get('suket_domisili', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'suket_domisili'])->name('suket_domisili.index');
    Route::get('suket_kelahiran', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'suket_kelahiran'])->name('suket_kelahiran.index');
    Route::get('suket_kematian', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'suket_kematian'])->name('suket_kematian.index');
    Route::get('suket_pendatang', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'suket_pendatang'])->name('suket_pendatang.index');
    Route::get('suket_pindah', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'suket_pindah'])->name('suket_pindah.index');
    Route::get('cetak_suket_domisili', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'cetak_suket_domisili'])->name('cetak_suket_domisili.index');
    Route::get('cetak_suket_kelahiran', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'cetak_suket_kelahiran'])->name('cetak_suket_kelahiran.index');
    Route::get('cetak_suket_kematian', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'cetak_suket_kematian'])->name('cetak_suket_kematian.index');
    Route::get('cetak_suket_pendatang', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'cetak_suket_pendatang'])->name('cetak_suket_pendatang.index');
    Route::get('cetak_suket_pindah', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'cetak_suket_pindah'])->name('cetak_suket_pindah.index');
    Route::get('cetak_surat_keterangan', [App\Http\Controllers\Staff\SuratKeteranganController::class, 'cetak_surat_keterangan'])->name('cetak_surat_keterangan.index');
    Route::resource('users', App\Http\Controllers\Staff\UserController::class);
});

Route::middleware(['auth'])->prefix('user/')->name('user.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('messages', App\Http\Controllers\User\MessageController::class);
    Route::resource('submission_letter', App\Http\Controllers\User\PengajuanSuratController::class);
    Route::get('cetak_surat_keterangan', [App\Http\Controllers\User\SuratKeteranganController::class, 'cetak_surat_keterangan'])->name('cetak_surat_keterangan.index');
    Route::resource('histories', App\Http\Controllers\User\HistoryController::class);
});
