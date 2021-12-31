<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FusController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ValidasiController;
use App\Models\Jadwal;

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


Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('summary', [DashboardController::class, 'summary']);

Route::resource('jadwals', JadwalController::class);
Route::get('table-jadwals', [JadwalController::class, 'table']);
Route::resource('fuses', FusController::class);
Route::get('table-fus', [FusController::class, 'table']);


Route::patch('fus/ajukan/{id}', [FusController::class, 'ajukan']);

Route::resource('services', ServiceController::class);
Route::get('table-services', [ServiceController::class, 'table']);

Route::resource('profile', ProfileController::class);
Route::resource('validasi', ValidasiController::class);

Route::patch('fus/approve/{id}', [ValidasiController::class, 'approve']);
Route::patch('fus/reject/{id}', [ValidasiController::class, 'reject']);

Route::get('ubah-password', [ProfileController::class, 'ubahPassword']);
Route::post('ubah-password', [ProfileController::class, 'storePassword']);

Route::get('data-summary', [DashboardController::class, 'dataSummary']);

require __DIR__.'/auth.php';
