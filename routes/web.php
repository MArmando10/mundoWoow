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

Route::get('/', function () {

   $pdf = PDF::loadView('pdf.index');

   return $pdf->stream();
 });


Route::resource('curso','cursoController');	

Route::resource('pdf','imprimirController');	



// Route::get('curso','cursoController@index');
// Route::any('searchdcurso','cursoController@searchcurso'                             )->name('curso.search');



// Route::get('/test/', function(){
// 	$pdf = PDF::loadView('pruebaparapdf');
// 	return $pdf->download('Pruebapdf.pdf');
// });