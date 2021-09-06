<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('task/registro',  [TaskController::class, 'register'])->name('task.registro');

Route::get('task/task/{id}',  [TaskController::class, 'show'])->name('task.task');

Route::get('task/lista/{filtro?}',[TaskController::class, 'showlist'])->name('task.lista');

Route::put('task/modify/{id}',[TaskController::class, 'modifyStatus'])->name('task.modify');
Route::put('task/update/{id}',[TaskController::class, 'update'])->name('task.update');
Route::delete('task/delete/{id}', [TaskController::class, 'destroy'])->name('task.delete');

