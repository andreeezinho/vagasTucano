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
    //candidatar usuario na vaga
    public function candidatar(Request $request, $id){
        $user = auth()->user();

        //verifica se vaga realmente existe
        if(!$vaga = Vaga::find($id)){
            return redirect('/')->with('erro', 'Vaga não encontrada');
        }

        //traz arquivo do curriculo
        $curriculo = $request->file('curriculo');

        //validar o as informações do arquivo do curriculo
        $request->validate([
            'curriculo' => 'required|file|mimes:pdf|max:2048'
        ]);

        //verificar se existe arquivo de pdf
        if($request->hasFile('curriculo') && $request->file('curriculo')->isValid()){
            //criptografar o nome do arquivo
            $curriculoNome = md5($curriculo->getClientOriginalName().strtotime("now")).".".$curriculo->getClientOriginalExtension();

            //definir destino do arquivo
            $destino = public_path('vagas/curriculos');

            //mover arquivo para o diretorio (destino, nomeDoArquivo)
            $curriculo->move($destino, $curriculoNome);

            //candidatar usuario na vaga
            $user->userVagas()->attach($id, ['curriculo' => $curriculoNome]);   
        }else{
            return redirect()->back()->with('erro', 'O arquivo não foi validado');
        }

        return redirect()->back()->with('success', 'Você se candidatou a vaga com sucesso!');
    }

    //desvincular usuario da vaga
    public function sair($id){
        $user = auth()->user();

        //verifica se vaga realmente existe
        if(!$vaga = Vaga::find($id)){
            return redirect('/')->with('erro', 'Vaga não encontrada');
        }

        if($user){
            //fazer um "select" do usuario na vaga
            $userCurriculo = $user->userVagas()->wherePivot('vaga_id', $id)->first();
        }

        //pegar curriculo de usuario na vaga
        $curriculo = $userCurriculo->pivot->curriculo;
        
        //desvincular usuario da vaga
        $user->userVagas()->detach($id);

        //remover arquivo do curriculo do direorio
        unlink(public_path('vagas/curriculos/'.$curriculo));

        return redirect()->back()->with('success', 'Você se desvinculou da vaga');
    }
}
