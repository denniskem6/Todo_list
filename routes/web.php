<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoController::class, 'show'])->name('todo_list');
Route::post('/', [TodoController::class, 'save'])->name('todo_list');

Route::delete('/{item_id}', [TodoController::class, 'delete_item'])->name('delete_item');
Route::get('/{item_id}', [TodoController::class, 'edit'])->name('edit');
Route::post('/{item_id}', [TodoController::class, 'update'])->name('edit');

