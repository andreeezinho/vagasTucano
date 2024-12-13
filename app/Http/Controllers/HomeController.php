<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando model das vagas e empresa
use App\Models\Vaga;
use App\Models\Empresa;

class HomeController extends Controller
{
    //
    public function home(){
        //request do input de procurar vagas
        $search = request('search');

        if($search){
            //se procurar for setado (existir)
            $vagas = Vaga::where('status', 'Aberta')->where('nome', 'like', '%'.$search.'%')->get();
        }else{
            $vagas = Vaga::where('status', 'Aberta')->get();
        }

        //mostrar 6 empresas aleatorias
        $empresas = Empresa::inRandomOrder()->limit(6)->get();

        return view('welcome', compact('vagas', 'empresas', 'search'));
    }
}
