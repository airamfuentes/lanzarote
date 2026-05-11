<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\DatosController;
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return redirect('/aulas/');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/libros'       , [LibroController::class, 'listado'])->name('libros.listado');


Route::get('/libro/{id}'            , [LibroController::class, 'mostrar'])->name('libros.mostrar');
Route::get('/libro/actualizar/{id}' , [LibroController::class, 'actualizar'])->name('libros.actualizar');
Route::get('/libro/eliminar/{id}'   , [LibroController::class, 'eliminar'])->name('libros.eliminar');
Route::get('/libros/nuevo'          , [LibroController::class, 'alta'])->name('libros.alta');
Route::post('/libros/nuevo'         , [LibroController::class, 'almacenar'])->name('libros.almacenar');


Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');


use App\Http\Controllers\AulaController;

Route::get('/aulas',              [AulaController::class,'listado'])->name('aulas.listado');
Route::get('/aula/actualizar/{id}',[AulaController::class,'actualizar'])->name('aulas.actualizar');
Route::get('/aula/eliminar/{id}', [AulaController::class,'eliminar'])->name('aulas.eliminar');
Route::get('/aula/{id}',          [AulaController::class,'mostrar'])->name('aulas.mostrar');
Route::get('/aulas/nuevo',        [AulaController::class,'alta'])->name('aulas.alta');
Route::post('/aulas/nuevo',       [AulaController::class,'almacenar'])->name('aulas.almacenar');

use App\Http\Controllers\TutorController;

Route::get('/tutores',               [TutorController::class,'listado'])->name('tutores.listado');
Route::get('/tutor/actualizar/{id}', [TutorController::class,'actualizar'])->name('tutores.actualizar');
Route::get('/tutor/eliminar/{id}',   [TutorController::class,'eliminar'])->name('tutores.eliminar');
Route::get('/tutor/{id}/horario',    [TutorController::class,'horario'])->name('tutores.horario');
Route::get('/tutor/{id}',            [TutorController::class,'mostrar'])->name('tutores.mostrar');
Route::get('/tutores/nuevo',         [TutorController::class,'alta'])->name('tutores.alta');
Route::post('/tutores/nuevo',        [TutorController::class,'almacenar'])->name('tutores.almacenar');

require __DIR__.'/auth.php';
