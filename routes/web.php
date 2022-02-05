<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('registro',RegistroController::class);
Route::get('/', [RegistroController::class, 'index'])->name('registro.index');
Route::post('/registro/store', [RegistroController::class, 'store'])->name('registro.store');
Route::post('/registro/show', [RegistroController::class, 'show'])->name('registro.show');
Route::post('/registro/update', [RegistroController::class, 'update'])->name('registro.update');
Route::get('/registro/destroy/{id}', [RegistroController::class, 'destroy'])->name('registro.destroy');

Route::post('/registro/municipios',[RegistroController::class, 'search'])->name('registro.getMunicipios');