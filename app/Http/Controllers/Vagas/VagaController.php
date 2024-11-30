<?php

namespace App\Http\Controllers\Vagas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//importando request da vaga
//use App\Http\Requests\

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

        return view('vagas.create');
    }

    //cadastrar vaga
    public function store($id){
        $user = auth()->user();

        //verifica se empresa existe
        if(!$empresa = Empresa::find($id)){
            return redirect()->back()->with('erro', 'Empresa não encontrada');
        }
        //verifica dono da empresa
        if($empresa->user_id != $user->id){
            return redirect()->back()->with('erro', 'Você não possui acesso a essa empresa');
        }

        //verificar dados
        

        return redirect()->route('empresas.dashboard', $id)->with('success', 'Vaga cadastrada com sucesso!');
    }
}
