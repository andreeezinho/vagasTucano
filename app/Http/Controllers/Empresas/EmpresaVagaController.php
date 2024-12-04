<?php

namespace App\Http\Controllers\Empresas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//importando requests
use App\Http\Requests\StoreVaga;
use App\Http\Requests\StoreEmpresa;

//importando models
use App\Models\Vaga;
use App\Models\Empresa;
use App\Models\User;

class EmpresaVagaController extends Controller
{
    //fazer verificacoes
    private function verificacoes($id, $id_vaga){
        $user = auth()->user();

        //verifica se empresa existe
        if(!$empresa = Empresa::find($id)){
            return redirect('/')->with('erro', 'Empresa não encontrada');
        }

        //verifica se vaga existe
        if(!$vaga = Vaga::find($id_vaga)){
            return redirect('/')->with('erro', 'Vaga não encontrada');
        }

        //verifica se é user é socio
        if($user->socio != true){
            return redirect('/')->with('erro', 'Permissão necessária não encontrada');
        }

        //verifica se user é dono da empresa
        if($empresa->user_id != $user->id){
            return redirect('/')->with('erro', 'Você não tem permissão para essa empresa');
        }
    }

    //classe para mostrar view de candidatos da vaga
    public function candidatos($id, $id_vaga){
        //chama funcao para verificacoes
        $verificacoes = $this->verificacoes($id, $id_vaga);
        if($verificacoes){
            return $verificacoes;
        }

        $vaga = Vaga::find($id_vaga);

        $candidatos = $vaga->candidatos;

        return view('empresas.candidatos', ['id' => $id, 'id_vaga' => $id_vaga, 'candidatos' => $candidatos]);
    }

    //ver detalhes do candidato
    public function candidatoDetalhes($id, $id_vaga, $id_candidato){
        //chama funcao para verificacoes
        $verificacoes = $this->verificacoes($id, $id_vaga);
        if($verificacoes){
            return $verificacoes;
        }

        //verifica se encontra usuario
        if(!$candidato = User::find($id_candidato)){
            return redirect('/')->with('erro', 'Candidato não encontrado');
        }

        return view('empresas.candidatos_detalhes', ['id' => $id, 'id_vaga' => $id_vaga, 'candidato' => $candidato]);

    }

    //aprovar candidato para entrevista
    public function candidatoEntrevista($id, $id_vaga, $id_candidato){
        //chama funcao para verificacoes
        $verificacoes = $this->verificacoes($id, $id_vaga);
        if($verificacoes){
            return $verificacoes;
        }

        //verifica se encontra usuario
        if(!$candidato = User::find($id_candidato)){
            return redirect('/')->with('erro', 'Candidato não encontrado');
        }

        return view('entrevistas.criar', ['id' => $id, 'id_vaga' => $id_vaga, 'candidato' => $candidato]);
    }
}
