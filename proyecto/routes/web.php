<?php

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
    return view('login')->with('msg','');
});

Route::get('panel', function (){
	return view('dashboard');
});

Route::post('login', 'login@iniciarSesion');

Route::get("solicitudes", function (){
	return view('crearSolicitud')->with('msg','');
});

Route::get("solicitudSemestral", function(){
	return view('creaSemestral')->with('msg','');
});

Route::post("solicitudSemestral","solicitudes@crearSemestral");

Route::post('solicitaInsumos', 'solicitudes@crearInsumos');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('logout','login@cerrarSesion');





Route::get('solicitudSemestralAdmin', function(){
	return view('revisarSemestral')->with('msg','');
});

Route::get('solicitudesAdmin', function(){
	return view('revisarInsumos')->with('msg','');
});
Route::get('aceptarSem/{num}',"solicitudes@aceptarSem");
Route::get('rechazarSem/{num}',"solicitudes@rechazarSem");
Route::get('aceptarInsu/{num}',"solicitudes@aceptarInsu");
Route::get('rechazarInsu/{num}',"solicitudes@rechazarInsu");