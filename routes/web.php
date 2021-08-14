<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CutiController;
use App\Models\Pegawai;

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

Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard',function(){
    $jmlh = Pegawai::all();
    return view('admin.dashboard',['jmlh'=>count($jmlh)]);
})->name('dashboard');

Route::resources([
    'bagian' => BagianController::class,
    'jabatan'=> JabatanController::class,
    'pegawai'=> PegawaiController::class,
    'cuti' => CutiController::class
]);
});



