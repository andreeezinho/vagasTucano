<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importando model da empresa
use App\Models\Vaga;

class HomeController extends Controller
{
    //
    public function home(){
        //busca todas as vagas aberta
        $vagas = Vaga::where('status', 'Aberta')->get();

        return view('welcome', ["vagas" => $vagas]);
    }
}
