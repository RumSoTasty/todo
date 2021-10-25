<?php

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
    return view('auth.login');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');

Route::get('/todo', [App\Http\Controllers\TodoController::class, 'todo'])->name('todo');
Route::post('/todo/check', [App\Http\Controllers\TodoController::class, 'todoCheck'])->name('todo_check');
Route::get('/todo/donelist', [App\Http\Controllers\TodoController::class, 'todoDonelist'])->name('todo_done_list');

Route::get('/todo/done/{id}', [App\Http\Controllers\TodoController::class, 'todoDone'])->name('todo_done');
Route::get('/todo/undone/{id}', [App\Http\Controllers\TodoController::class, 'todoUndone'])->name('todo_undone');


