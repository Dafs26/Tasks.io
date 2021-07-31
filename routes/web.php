<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/task_creation', [TaskController::class, 'create'])->name('task.create');
Route::post('/task_creation', [TaskController::class, 'store'])->name('task.store');
Route::get('/log', [LogController::class, 'index'])->name('log.index');
Route::post('/log', [LogController::class, 'store'])->name('log.store');
