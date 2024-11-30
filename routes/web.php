<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//importar controllers
use App\Http\Controllers\Users\CreateController;
use App\Http\Controllers\Empresas\EmpresaController;
use App\Http\Controllers\Empresas\DashboardController;
use App\Http\Controllers\Vagas\VagaController;

//rota que só podem ser acessadas com autenticação
Route::middleware('auth')->group(function(){
    //rota para cadastrar a vaga
    Route::post('/empresas/{id}/vagas/cadastro', [VagaController::class, 'store'])->name('vaga.store');

    //rota para a view de cadastro da vaga
    Route::get('/empresas/{id}/vagas/cadastro', [VagaController::class, 'create'])->name('vaga.cadastro');

    //rota para dashboard da empresa
    Route::get('/empresas/{id}/dashboard', [DashboardController::class, 'dashboard'])->name('empresas.dashboard');

    //rota para a view de cadastrar a empresa
    Route::get('/empresas/cadastro', [EmpresaController::class, 'create'])->name('empresas.create');

    //rota para store da empresa
    Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');
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
