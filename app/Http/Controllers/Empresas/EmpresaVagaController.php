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

class EmpresaVagaController extends Controller
{
    //classe para mostrar view de candidatos da vaga
    public function candidatos($id, $id_vaga){
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

        return $vaga->candidatos;
    }
}
