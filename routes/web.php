<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/dashboard','admin.dashboard')->name('dashboard');

Route::resources([
    'bagian' => BagianController::class,
    'jabatan'=> JabatanController::class,
    'pegawai'=> PegawaiController::class
]);
