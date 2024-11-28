<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//importar controllers
use App\Http\Controllers\Users\CreateController;

//rota que só podem ser acessadas com autenticação
Route::middleware('auth')->group(function(){

});

Route::get('/', function () {
    return view('welcome');
})->name('home');

//cadastro de usuario
Route::get('/cadastro', [CreateController::class, 'create'])->name('users.create');
//store de usuario (criar)
Route::post('/cadastro', [CreateController::class, 'store'])->name('users.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
