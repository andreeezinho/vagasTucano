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
        $userNaVaga = $vaga->candidatos;

        //verifica se usuario já está candidatado na vaga
        if($user){
            //passa os usuarios como array
            $verifica = $userNaVaga->toArray();

            foreach($verifica as $candidato){
                //se usuario ja estiver na vaga
                if($candidato['id'] == $id);

                $participa = true;
            }
        }

        return view('vagas.detalhes', ['vaga' => $vaga, 'participa' => $participa]);
    }
}
