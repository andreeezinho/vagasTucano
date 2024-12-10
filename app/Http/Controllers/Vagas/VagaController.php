<?php

namespace App\Http\Controllers\Vagas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//importando request da vaga
use App\Http\Requests\StoreVaga;

//importando model da vaga
use App\Models\Vaga;

//importando model da empresa
use App\Models\Empresa;

class VagaController extends Controller
{
    //view para mostrar todas as vagas
    public function show(){
        $vagas = Vaga::all();

        return view('vagas.show', ['vagas' => $vagas]);
    }

    //view para mostrar vagas que o usuario participa
    public function suasVagas(){
        $user = auth()->user();

        $vagas = $user->userVagas;

        return view('users.vagas-candidatadas', compact('vagas'));
    }

    //classe para a view de cadastro de vaga
    public function create($id){
        $user = auth()->user();

        //verifica se empresa existe
        if(!$empresa = Empresa::find($id)){
            return redirect()->back()->with('erro', 'Empresa não encontrada');
        }
        //verifica dono da empresa
        if($empresa->user_id != $user->id){
            return redirect()->back()->with('erro', 'Você não possui acesso a essa empresa');
        }

        return view('vagas.create', ['empresa' => $empresa->id]);
    }

    //cadastrar vaga
    public function store(StoreVaga $request, $id){
        $user = auth()->user();

        //verificar dados
        $valida = $request->validated();

        //verifica se empresa existe
        if(!$empresa = Empresa::find($id)){
            return redirect()->back()->with('erro', 'Empresa não encontrada');
        }
        //verifica dono da empresa
        if($empresa->user_id != $user->id){
            return redirect()->back()->with('erro', 'Você não possui acesso a essa empresa');
        }

        $valida['empresa_id'] = $id;

        Vaga::create($valida);

        return redirect()->route('empresas.dashboard', $id)->with('success', 'Vaga cadastrada com sucesso!');
    }

    //classe para view de detalhes
    public function detalhes($id){
        $user = auth()->user();

        //verificar se a vaga existe
        if(!$vaga = Vaga::find($id)){
            return redirect('/')->with('erro', 'Vaga não encontrada');
        }

        //verificar se vaga está aberta
        if($vaga->status != "Aberta"){
            return redirect('/')->with('erro', 'Esta vaga não está mais aberta');
        }

        $participa = false;

        //verifica se usuario já está candidatado na vaga
        if($user){
            //pega do model User a funcao userVagas e transforma em array
            $verifica = $user->userVagas->toArray();

            //percorrer cada vaga que o usuario participa
            foreach($verifica as $candidato){
                //se id da vaga for igual o id dessa vaga especifica
                if($candidato['id'] == $id){
                    $participa = true;
                }
            }
        }

        return view('vagas.detalhes', ['vaga' => $vaga, 'participa' => $participa]);;
    }

    //---verificacoes
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
    //---------------


    //classe para deletar vaga
    public function delete($id, $id_vaga){
        //fazendo verificacao de usuario, empresa e vaga
        $verificacoes = $this->verificacoes($id, $id_vaga);
        if($verificacoes){
            return $verificacoes;
        }

        if(!$vaga = Vaga::find($id_vaga)){
            return redirect()->back()->with('erro', 'Vaga não encontrada');
        }

        $vaga->delete();

        return redirect()->back()->with('success', 'Vaga removida');
    }
}
