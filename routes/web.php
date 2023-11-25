<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\CripsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kriteria', KriteriaController::class);
Route::resource('alternatif', AlternatifController::class);
Route::resource('subkriteria', CripsController::class);
Route::resource('penilaian', PenilaianController::class);

Route::get('/subkriteria/create/{kriteria}', [CripsController::class,'add'])->name('subkriteria.add');
// Route::get('/penilaian/{id}', [PenilaianController::class,'storeUpdate'])->name('penilaian.storeUpdate');
