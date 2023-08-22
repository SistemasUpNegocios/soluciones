<?php

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

// Rutas para panel principal de control
Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');
Route::get('/showTraders', [App\Http\Controllers\DashboardController::class, 'getTraders'])->middleware('auth');
Route::get('/admin/getPruebasVida', [App\Http\Controllers\DashboardController::class, 'getPruebasVida'])->middleware('auth');

// Rutas para portafolios activos
Route::get('/admin/portafoliosActivos', [App\Http\Controllers\PortafoliosActivosController::class, 'index'])->middleware('auth');
Route::get('/showPortafoliosActivos', [App\Http\Controllers\PortafoliosActivosController::class, 'getTraders'])->middleware('auth');
Route::get('/admin/getPortafoliosActivos', [App\Http\Controllers\PortafoliosActivosController::class, 'getPruebasVida'])->middleware('auth');


// Rutas para gráficas
Route::get('/admin/equityBalance/{id}', [App\Http\Controllers\GraficaController::class, 'index'])->middleware('auth');
Route::get('/admin/getTrader', [App\Http\Controllers\GraficaController::class, 'getTrader'])->middleware('auth');

// Rutas para gráficas Market
//Route::get('/admin/market', [App\Http\Controllers\MarketController::class, 'index'])->middleware('auth');
//Route::get('/admin/getMarket', [App\Http\Controllers\MarketController::class, 'getMarket'])->middleware('auth');


// Rutas de login y registro
Route::get('/', [App\Http\Controllers\SessionController::class, 'create'])->name('login');
Route::post('/', [App\Http\Controllers\SessionController::class, 'store'])->name('login.store');
Route::get('/admin/logout', [App\Http\Controllers\SessionController::class, 'destroy'])->middleware('auth');

Route::get('/registro', [App\Http\Controllers\RegisterController::class, 'create'])->name('registro');
Route::post('/registro', [App\Http\Controllers\RegisterController::class, 'store'])->name('registro.store');



//ruta de perfil
Route::get('/admin/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil')->middleware('auth');
Route::post('/admin/editPerfil', [App\Http\Controllers\PerfilController::class, 'editPerfil'])->middleware('auth');


//Rutas de logs
Route::get('/admin/historialCambios', [App\Http\Controllers\TablaLogsController::class, 'index'])->name('tablalogs');
Route::get('/admin/showCambios', [App\Http\Controllers\TablaLogsController::class, 'getTablaLogs']);
Route::post('/admin/deleteCambio', [App\Http\Controllers\TablaLogsController::class, 'deleteTablaLogs']);

//Rutas de bitácora de acceso/admin/bitacoraAcceso
Route::get('/admin/bitacoraAcceso', [App\Http\Controllers\BitacoraAccesoController::class, 'index'])->name('bitacoraacceso');
Route::get('/admin/getDetallesBitacora', [App\Http\Controllers\BitacoraAccesoController::class, 'getDetallesBitacora']);

//Transmisiones
Route::get('/admin/transmision', [App\Http\Controllers\TransmisionController::class, 'index'])->middleware('auth');
Route::get('/admin/showTransmision', [App\Http\Controllers\TransmisionController::class, 'getLive'])->middleware('auth');
Route::post('/admin/addLive', [App\Http\Controllers\TransmisionController::class, 'addLive'])->middleware('auth');
Route::post('/admin/deleteLive', [App\Http\Controllers\TransmisionController::class, 'deleteLive'])->middleware('auth');

Route::get('/admin/transmisionLive', [App\Http\Controllers\LiveController::class, 'index'])->middleware('auth');




//Gráfico portafolios
Route::get('/admin/portafolio', [App\Http\Controllers\PortafolioController::class, 'index'])->middleware('auth');
Route::get('/admin/getPortafolio', [App\Http\Controllers\PortafolioController::class, 'getPortafolio'])->middleware('auth');

//Gráfico portafolios rectangulares
Route::get('/admin/portafolioGraph', [App\Http\Controllers\PortafoliosGraphController::class, 'index'])->middleware('auth');
Route::get('/admin/getPortafolioGraph', [App\Http\Controllers\PortafoliosGraphController::class, 'getPortafolioGraph'])->middleware('auth');

//Gráfico clave inversores
Route::get('/admin/claveInversor', [App\Http\Controllers\ClaveInversorController::class, 'index'])->middleware('auth');
Route::get('/admin/showClaveInversor', [App\Http\Controllers\ClaveInversorController::class, 'getClaveInversor'])->middleware('auth');
Route::post('/admin/addClaveInversor', [App\Http\Controllers\ClaveInversorController::class, 'addClaveInversor'])->middleware('auth');
Route::post('/admin/deleteClaveInversor', [App\Http\Controllers\ClaveInversorController::class, 'deleteClaveInversor'])->middleware('auth');

//Historicos operaciones
Route::get('/admin/historicos', [App\Http\Controllers\HistoricoOperacionesController::class, 'index'])->name('HistoricoOperaciones')->middleware('auth');
Route::get('/admin/historicosShow', [App\Http\Controllers\HistoricoOperacionesController::class, 'getHistoricos'])->middleware('auth');
Route::get('/admin/historicosShowFiltro', [App\Http\Controllers\HistoricoOperacionesController::class, 'getHistoricosFiltro'])->middleware('auth');


