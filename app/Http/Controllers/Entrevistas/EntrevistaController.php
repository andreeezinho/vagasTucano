<?php

namespace App\Http\Controllers\Entrevistas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreEntrevista;

//importando models
use App\Models\Vaga;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Entrevista;

class EntrevistaController extends Controller
{
    //classe de verificacoes
    private function verificacoes($id, $id_vaga, $id_candidato){
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

    //classe para criar a entrevista e relacionar usuario:entrevista
    public function store(StoreEntrevista $request, $id, $id_vaga, $id_candidato){
        //verificações da empresa e usuario
        $verificacoes = $this->verificacoes($id, $id_vaga, $id_candidato);
        if($verificacoes){
            return $verificacoes;
        }

        //verifica se candidato existe
        if(!$candidato = User::find($id_candidato)){
            return redirect('/')->with('erro', 'Candidato não encontrado');
        }

        $valida = $request->validated();

        //define id da vaga
        $valida['vaga_id'] = $id_vaga;

        //cria entrevista
        $entrevista = Entrevista::create($valida);

        //atrelar usuario a entrevista
        $candidato->userEntrevista()->attach($entrevista->id);

        return redirect()->back()->with('success', 'Entrevista marcada com sucesso');
    }
}
