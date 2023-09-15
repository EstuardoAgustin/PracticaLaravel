<?php

use App\Http\Controllers\EstuardoController;
use App\Http\Controllers\TablaController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return view('welcome');
});

Route::get('/saludos', function () {
    return view('app');
});

Route::get('/tareas', function () {
    return view('todos.index');
});


//Route::post('/tareas', [EstuardoController::class, 'store'] )->name('todos');
//Route::post('/tareas', [TablaController::class, 'store'])->name('todos');


Route::post('/tareas', [TodosController::class, 'store'] )->name('todos');
Route::get('/tareas', [TodosController::class, 'index'] )->name('todos');
Route::patch('/tareas', [TodosController::class, 'store'] )->name('todos-edit');
Route::delete('/tareas', [TodosController::class, 'store'] )->name('todos-destroy');
Route::delete('/tareas', [TodosController::class, 'store'] )->name('todos-destroy');