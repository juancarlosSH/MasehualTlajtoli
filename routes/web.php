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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('cursos', [App\Http\Controllers\CourseController::class, 'consultar_cursos'])->name('cursos');

//Route::get('cursos/{id}', [App\Http\Controllers\CourseController::class, 'detalle_curso'])->name('cursos.detalle');

Route::get('cursos/{id}/actividades', [App\Http\Controllers\ActivityController::class, 'consultar_actividades_curso'])->name('actividades');

