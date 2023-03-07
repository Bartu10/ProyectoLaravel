<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImagenController;
use \App\Http\Controllers\ComentarioController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/users', [Controller::class, 'show'])->name('users');
    Route::get('/images', [ImagenController::class, 'shows'])->name("photos");
    Route::get('/image/{id}', [ImagenController::class, 'showOne'])->name("showOne");
    Route::get('/createImage' ,[ImagenController::class, 'upload'])->name("makePhoto");
    Route::patch ('/comment/{id}', [ComentarioController::class, 'store'])->name("store");
    Route::delete('/comment/{id}', [ComentarioController::class, 'delete'])->name("delete");
    Route::patch('/create' ,[ImagenController::class, 'crear'])->name("photosCreate");
    Route::get('/misPublicaciones', [ImagenController::class, 'showUser'])->name("imagenUser");
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});

require __DIR__.'/auth.php';
