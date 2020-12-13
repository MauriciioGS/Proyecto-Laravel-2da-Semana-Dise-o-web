<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\EntregaController;
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
})->middleware('welcome');

Route::resource('entregas', EntregaController::class);

Route::get('saludos/{nombre?}',function($nombre){
	return "hola ".$nombre;
});

Route::get('admin', function(){
	return "Eres admin";
})->middleware('admin');

Route::middleware(['admin'])->group(function(){
	Route::get('admin2', function(){
		return view('layouts.admin');
	});
	Route::resource('admintareas', TareaController::class);
});

Auth::routes(); //Agrupa las rutas de acciones de autenticación

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('calif', [App\Http\Controllers\HomeController::class, 'calif'])->name('calif');
