<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[App\Http\Controllers\MercosurController::class, 'index']);
Route::get('/comerciales', function () {
    return "Relaciones comerciales";
});


Route::prefix('admin')->group(function () {
    Route::get('/',[App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/comerciales', [App\Http\Controllers\ComercialController::class, 'index']);
    Route::post('/comerciales', [App\Http\Controllers\ComercialController::class, 'store']);
    Route::delete('/comerciales/{comercial}', [App\Http\Controllers\ComercialController::class, 'destroy'])->name('comercial.destroy');
    Route::post('/comerciales/edit', [App\Http\Controllers\ComercialController::class, 'editarComercial']);
    #--------
    Route::get('/diplomaticas', [App\Http\Controllers\DiplomaticaController::class, 'index']);
    Route::post('/diplomaticas', [App\Http\Controllers\DiplomaticaController::class, 'store']);
    Route::delete('/diplomaticas/{diplomatica}', [App\Http\Controllers\DiplomaticaController::class, 'destroy'])->name('diplomatica.destroy');
    #--------
});


Auth::routes();



