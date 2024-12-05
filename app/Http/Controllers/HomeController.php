<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando model da empresa
use App\Models\Vaga;

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

        return view('welcome', ["vagas" => $vagas]);
    }
}
