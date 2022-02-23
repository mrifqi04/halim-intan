<?php

use App\Models\Jadwal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\DashboardController;

// testing github 

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('summary', [DashboardController::class, 'summary']);

    Route::resource('jadwals', JadwalController::class);
    Route::get('table-jadwals', [JadwalController::class, 'table']);
    Route::resource('fuses', FusController::class);
    Route::get('table-fus', [FusController::class, 'table']);
    Route::post('update_status_jadwal', [JadwalController::class, 'updateStatus']);


    Route::patch('fus/ajukan/{id}', [FusController::class, 'ajukan']);

    Route::resource('services', ServiceController::class);
    Route::get('table-services', [ServiceController::class, 'table']);
    Route::post('export-service', [ServiceController::class, 'export']);

    Route::resource('profile', ProfileController::class);
    Route::resource('validasi', ValidasiController::class);
    Route::post('export-validasi', [ValidasiController::class, 'export']);

    Route::post('fus/approve/{id}', [ValidasiController::class, 'approve']);
    Route::post('fus/reject/{id}', [ValidasiController::class, 'reject']);

    Route::get('ubah-password', [ProfileController::class, 'ubahPassword']);
    Route::post('ubah-password', [ProfileController::class, 'storePassword']);

    Route::get('data-summary', [DashboardController::class, 'dataSummary']);

    Route::resource('users', UserController::class);

    Route::get('get-notifikasi', [DashboardController::class, 'notifikasi']);
    Route::post('read-notifikasi', [DashboardController::class, 'readNotifikasi']);
    Route::post('check-jadwals', [DashboardController::class, 'checkJadwal']);
});


require __DIR__ . '/auth.php';
