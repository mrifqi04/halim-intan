<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FusController;
use App\Http\Controllers\JadwalController;

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


Route::get('/dashboard', function () {
    return view('halaman_utama');
})->middleware(['auth'])->name('dashboard');

Route::resource('jadwals', JadwalController::class);
Route::resource('fuses', FusController::class);
Route::patch('fus/ajukan/{id}', [FusController::class, 'ajukan']);

require __DIR__.'/auth.php';
