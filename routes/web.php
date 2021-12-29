<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FusController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

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
    return view('profile.index');
})->middleware(['auth'])->name('dashboard');

Route::resource('jadwals', JadwalController::class);
Route::resource('fuses', FusController::class);
Route::patch('fus/ajukan/{id}', [FusController::class, 'ajukan']);
Route::resource('services', ServiceController::class);
Route::resource('profile', ProfileController::class);

Route::get('ubah-password', [ProfileController::class, 'ubahPassword']);
Route::post('ubah-password', [ProfileController::class, 'storePassword']);

require __DIR__.'/auth.php';
