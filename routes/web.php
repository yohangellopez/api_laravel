<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::post('task/registro',  [TaskController::class, 'register'])->name('task.registro');
Route::get('task/lista',      [TaskController::class, 'showlist'])->name('task.lista');
Route::post('task/update/{id}',[TaskController::class, 'update'])->name('task.update');
Route::get('task/delete/{id}', [TaskController::class, 'destroy'])->name('task.delete');
