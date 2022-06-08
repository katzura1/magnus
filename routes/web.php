<?php

use App\Http\Controllers\PesertaController;
use App\Models\Peserta;
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

Route::get('/', [PesertaController::class, 'index'])->name('peserta.index');

Route::post('peserta/save', [PesertaController::class, 'save'])->name('peserta.save');
Route::post('peserta/delete', [PesertaController::class, 'delete'])->name('peserta.delete');
Route::post('peserta/data', [PesertaController::class, 'data'])->name('peserta.data');
