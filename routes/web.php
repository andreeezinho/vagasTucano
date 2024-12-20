<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//importar controllers
use App\Http\Controllers\Users\CreateController;
use App\Http\Controllers\Users\UpdateController;
use App\Http\Controllers\Empresas\EmpresaController;
use App\Http\Controllers\Empresas\DashboardController;
use App\Http\Controllers\Empresas\EmpresaVagaController;
use App\Http\Controllers\Empresas\UpdateEmpresaController;
use App\Http\Controllers\Entrevistas\EntrevistaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Vagas\VagaController;
use App\Http\Controllers\Vagas\CandidatoController;

//rota que só podem ser acessadas com autenticação
Route::middleware('auth')->group(function(){
    //rota para view de vagas candidatadas
    Route::get('/suas-vagas', [VagaController::class, 'suasVagas'])->name('users.vagas');

    Route::get('/entrevistas', [EntrevistaController::class, 'show'])->name('users.entrevistas');

    //para para usuario a sair da vaga
    Route::post('/vagas/{id}/sair', [CandidatoController::class, 'sair'])->name('vaga.sair');
    
    //para para usuario se candidatar a vaga
    Route::post('/vagas/{id}/candidatar', [CandidatoController::class, 'candidatar'])->name('vaga.candidatar');

    //rota para deletar o usuario
    Route::delete('/destroy', [UpdateController::class, 'destroy'])->name('user.destroy');

    //rota para atualizar o usuario
    Route::put('/update', [UpdateController::class, 'update'])->name('user.update');

    //rota para editar usuario
    Route::get('/editar', [UpdateController::class, 'edit'])->name('user.edit');

    //rota para socio ver suas empresas
    Route::get('/socio', [EmpresaController::class, 'empresas'])->name('user.empresas');

    //ROTAS PARA EMPRESA//
    Route::prefix('empresas')->group(function(){

        //rota para excluir entrevista do usuario
        Route::delete('/{id}/vagas/{id_vaga}/candidatos/{id_candidato}/{id_entrevista}', [EntrevistaController::class, 'remover'])->name('candidato.entrevista.remover');

        //rota para atualizar entrevista
        Route::put('/{id}/vagas/{id_vaga}/candidatos/{id_candidato}/{id_entrevista}/update', [EntrevistaController::class, 'update'])->name('entrevista.update');

        //rota para view de editar entrevista
        Route::get('/{id}/vagas/{id_vaga}/candidatos/{id_candidato}/{id_entrevista}/editar', [EntrevistaController::class, 'edit'])->name('entrevista.edit');

        //rota para criar a entrevista
        Route::post('/{id}/vagas/{id_vaga}/candidatos/{id_candidato}/marcar', [EntrevistaController::class, 'store'])->name('candidato.aprovar');

        //rota para view de criar entrevista com o usuario
        Route::get('/{id}/vagas/{id_vaga}/candidatos/{id_candidato}/entrevista', [EmpresaVagaController::class, 'candidatoEntrevista'])->name('candidato.entrevista');

        //rota para ver datalhes dos candidatos
        Route::get('/{id}/vagas/{id_vaga}/candidatos/{id_candidato}', [EmpresaVagaController::class, 'candidatoDetalhes'])->name('candidato.detalhes');

        //rota para ver entrevistas
        Route::get('/{id}/vagas/{id_vaga}/entrevistas', [EntrevistaController::class, 'showEntrevistas'])->name('vaga.entrevistas');

        //rota para view de ver candidatos nas vagas
        Route::get('/{id}/vagas/{id_vaga}/candidatos', [EmpresaVagaController::class, 'candidatos'])->name('vaga.candidatos');

        //rota para excluir vaga
        Route::delete('/{id}/vagas/{id_vaga}/delete', [VagaController::class, 'delete'])->name('vaga.delete');

        //rota para atualizar a vaga
        Route::put('/{id}/vagas/{id_vaga}/editar', [VagaController::class, 'update'])->name('vaga.update');

        //rota para view de editar vaga
        Route::get('/{id}/vagas/{id_vaga}/editar', [VagaController::class, 'editar'])->name('vaga.editar');

        //rota para cadastrar a vaga
        Route::post('/{id}/vagas/cadastro', [VagaController::class, 'store'])->name('vaga.store');

        //rota para a view de cadastro da vaga
        Route::get('/{id}/vagas/cadastro', [VagaController::class, 'create'])->name('vaga.cadastro');

        //rota para dashboard da empresa
        Route::get('/{id}/dashboard', [DashboardController::class, 'dashboard'])->name('empresas.dashboard');

        //rota para excluir empresa
        Route::delete('/{id}/destroy', [UpdateEmpresaController::class, 'destroy'])->name('empresas.destroy');

        //rota para atualizar empresa
        Route::put('/{id}/update', [UpdateEmpresaController::class, 'update'])->name('empresas.update');

        //rota para view de editar empresa
        Route::get('/{id}/edit', [UpdateEmpresaController::class, 'edit'])->name('empresas.edit');

        //rota para a view de cadastrar a empresa
        Route::get('/cadastro', [EmpresaController::class, 'create'])->name('empresas.create');

        //rota para store da empresa
        Route::post('/', [EmpresaController::class, 'store'])->name('empresas.store');

    });
});

//rota para ver detalhes da vaga
Route::get('/vagas/{id}/detalhes', [VagaController::class, 'detalhes'])->name('vaga.detalhes');

//rota para ver todas as vagas
Route::get('/vagas/all', [VagaController::class, 'show'])->name('vaga.show');

//rota para ver todas as empresasss
Route::get('/empresas/{id}', [EmpresaController::class, 'detalhes'])->name('empresas.detalhes');

//rota para ver todas as empresasss
Route::get('/empresas', [EmpresaController::class, 'show'])->name('empresas.show');

//cadastro de usuario
Route::get('/cadastro', [CreateController::class, 'create'])->name('users.create');
//store de usuario (criar)
Route::post('/cadastro', [CreateController::class, 'store'])->name('users.store');

//home
Route::get('/', [HomeController::class, 'home'])->name('home');

require __DIR__.'/auth.php';
