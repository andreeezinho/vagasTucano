<?php

namespace App\Http\Controllers\Vagas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//importando request da vaga
use App\Http\Requests\StoreVaga;

//importando model da vaga
use App\Models\Vaga;

class CandidatoController extends Controller
{
    public function candidatar($id){
        $user = auth()->user();

        //verifica se vaga realmente existe
        if(!$vaga = Vaga::find($id)){
            return redirect('/')->with('erro', 'Vaga não encontrada');
        }
        
        //candidatar usuario na vaga
        $user->userVagas()->attach($id);

        return redirect()->back()->with('success', 'Você se candidatoua vaga com sucesso!');
    }
}
