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

        //define id do candidato
        $valida['user_id'] = $candidato->id;

        //cria entrevista
        $entrevista = Entrevista::create($valida);

        return redirect()
                ->route('candidato.detalhes', ['id' => $id, 'id_vaga' => $id_vaga, 'id_candidato' => $candidato->id])
                ->with('success', 'Entrevista marcada com sucesso');
    }

    //classe para view de editar entrevista
    public function edit($id, $id_vaga, $id_candidato, $id_entrevista){
        //verificações da empresa e usuario
        $verificacoes = $this->verificacoes($id, $id_vaga, $id_candidato);
        if($verificacoes){
            return $verificacoes;
        }

        //verifica se entrevista existe
        if(!$entrevista = Entrevista::find($id_entrevista)){
            return redirect('/')->with('erro', 'Entrevista não encontrada');
        }

        //verifica se candidato existe
        if(!$candidato = User::find($id_candidato)){
            return redirect('/')->with('erro', 'Candidato não encontrado');
        }

        return view('entrevistas.edit', compact('id', 'id_vaga','entrevista', 'candidato'));
    }

    //atualizar informações da entrevista
    public function update(StoreEntrevista $request, $id, $id_vaga, $id_candidato, $id_entrevista){
        //verificações da empresa e usuario
        $verificacoes = $this->verificacoes($id, $id_vaga, $id_candidato);
        if($verificacoes){
            return $verificacoes;
        }

        //verifica se entrevista existe
        if(!$entrevista = Entrevista::find($id_entrevista)){
            return redirect('/')->with('erro', 'Entrevista não encontrada');
        }

        //verifica se candidato existe
        if(!$candidato = User::find($id_candidato)){
            return redirect('/')->with('erro', 'Candidato não encontrado');
        }

        //validar form
        $valida = $request->validated();

        $entrevista->update($valida);

        return redirect()->back()->with('success', 'Entrevista editada com sucesso');
    }

    public function remover($id, $id_vaga, $id_candidato, $id_entrevista){
        //verificações da empresa e usuario
        $verificacoes = $this->verificacoes($id, $id_vaga, $id_candidato);
        if($verificacoes){
            return $verificacoes;
        }

        //verifica se candidato existe
        if(!$candidato = User::find($id_candidato)){
            return redirect('/')->with('erro', 'Candidato não encontrado');
        }

        //verifica se entrevista existe
        if(!$entrevista = Entrevista::find($id_entrevista)){
            return redirect('/')->with('erro', 'Entrevista não encontrada');
        }

        //excluir entrevista marcada
        $entrevista->delete();

        return redirect()->back()->with('success', 'Entrevista removida');
    }

    //classe de mostrar entrevistas do usuario
    public function show(){
        $user = auth()->user();

        $entrevistas = $user->userEntrevista;

        return view('users.entrevistas-marcadas', ['entrevistas' => $entrevistas]);
    }

    //classe para mostrar entrevistas da vaga da empresa
    public function showEntrevistas($id, $id_vaga){
        //verificações da empresa e usuario
        $verificacoes = $this->verificacoes($id, $id_vaga);
        if($verificacoes){
            return $verificacoes;
        }

        $entrevistas = Entrevista::where('vaga_id', $id_vaga)->get();

        return view('empresas.entrevistas', ['id' => $id, 'entrevistas' => $entrevistas]);
    }
}
