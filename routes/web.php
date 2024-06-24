<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountResultController;
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DetailResultController;
use App\Http\Controllers\EndeudamientoController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\LiquidezController;
use App\Http\Controllers\PasivoController;
use App\Http\Controllers\PatrimonioController;
use App\Http\Controllers\RentabilidadController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

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
    return view('admin.panel');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

/******************************Estados Financieros***************************************/
//Rutas para las cuentas
Route::get('/admin/account/list',[AccountController::class,'list']);
Route::get('/admin/account/add',[AccountController::class,'add']);
Route::post('/admin/account/add',[AccountController::class,'insert']);
//Rutas para los detalles
Route::get('/admin/detail/add',[DetailController::class,'add']);
Route::post('/admin/detail/add',[DetailController::class,'insert']);
//Rutas para los activos
Route::get('/admin/activo/corriente',[ActivoController::class,'corriente']);
Route::get('/admin/activo/no_corriente',[ActivoController::class,'no_corriente']);
//Rutas para los Pasivos
Route::get('/admin/pasivo/corriente',[PasivoController::class,'corriente']);
Route::get('/admin/pasivo/no_corriente',[PasivoController::class,'no_corriente']);
//Rutas para el Patrimonio 
Route::get('/admin/patrimonio',[PatrimonioController::class,'patrimonio']);
//Rutas para estados resultados
Route::get('/admin/result/account/list',[AccountResultController::class,'list']);
Route::post('/admin/result/account/list',[AccountResultController::class,'insert']);
//Rutas para los detalles
Route::get('/admin/result/detail/add',[DetailResultController::class,'add']);
Route::post('/admin/result/detail/add',[DetailResultController::class,'insert']);
//Rutas para ver los resultados
Route::get('/admin/result',[ResultController::class,'result']);
//Rutas para liquidez
Route::get('/admin/ratio/liquidez/corriente',[LiquidezController::class,'corriente']);
Route::get('/admin/ratio/liquidez/acidez',[LiquidezController::class,'acidez']);
Route::get('/admin/ratio/liquidez/efectivo',[LiquidezController::class,'efectivo']);
Route::get('/admin/ratio/liquidez/capital_trabajo',[LiquidezController::class,'capital_trabajo']);
//RutaS para endeudamiento
Route::get('/admin/ratio/endeudamiento/apalancamiento',[EndeudamientoController::class,'apalancamiento']);
Route::get('/admin/ratio/endeudamiento/solvencia_patrimonial_largo_plazo',[EndeudamientoController::class,'solvencia_patrimonial_largo_plazo']);
Route::get('/admin/ratio/endeudamiento/solvencia_patrimonial',[EndeudamientoController::class,'solvencia_patrimonial']);
//Rutas para Rentabiliadd
Route::get('/admin/ratio/rentabilidad/mub',[RentabilidadController::class,'mub']);
Route::get('/admin/ratio/rentabilidad/mun',[RentabilidadController::class,'mun']);
Route::get('/admin/ratio/rentabilidad/rp',[RentabilidadController::class,'rp']);
Route::get('/admin/ratio/rentabilidad/roa',[RentabilidadController::class,'roa']);
Route::get('/admin/ratio/rentabilidad/roe',[RentabilidadController::class,'roe']);
//Rutas para Gestion
Route::get('/admin/ratio/gestion/existencia',[GestionController::class,'existencia']);
Route::get('/admin/ratio/gestion/cuentas_por_cobrar',[GestionController::class,'cuentas_cobrar']);
Route::get('/admin/ratio/gestion/cuentas_por_pagar',[GestionController::class,'cuentas_pagar']);
Route::get('/admin/ratio/gestion/activo_fijo',[GestionController::class,'activo_fijo']);