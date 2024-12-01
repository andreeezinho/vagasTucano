<?php

namespace App\Http\Controllers\Empresas;

use App\Http\Controllers\Controller;

//importando Model da empresa
use App\Models\Empresa;

use Illuminate\Http\Request;
//importando request
use App\Http\Requests\StoreEmpresa;

class DashboardController extends Controller
{
    //classe para a view principal
    public function dashboard($id){
        $user = auth()->user();

        //verifica se empresa existe
        if(!$empresa = Empresa::find($id)){
            return redirect()->back()->with('erro', 'Empresa não encontrada');
        }
        //verifica dono da empresa
        if($empresa->user_id != $user->id){
            return redirect()->back()->with('erro', 'Você não possui acesso a essa empresa');
        }

        //passando todas as vagas da empresa
        $vagas = $empresa->vagas;

        return view('empresas.dashboard', ['empresa' => $empresa, 'vagas' => $vagas]);
    }
}
