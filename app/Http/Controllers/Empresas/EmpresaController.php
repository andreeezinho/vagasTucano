<?php

namespace App\Http\Controllers\Empresas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

///importar request da empresa
use App\Http\Requests\StoreEmpresa;

//importando model
use App\Models\Empresa;

class EmpresaController extends Controller
{
    //mostrar todas as empresas
    public function show(){
        $empresas = Empresa::all();

        return view('empresas.show', compact('empresas'));
    }

    //mostrar empresas do usuario
    public function empresas(){
        $user = auth()->user();

        //verifica se usuario é sócio
        if($user->socio != true){
            return redirect('/')->with('erro','Permissão necessária não encontrada');
        }

        return view('empresas.empresas-socio', ['empresas' => $user->empresas]);
    }

    //mostrar detalhes da empresa
    public function detalhes($id){
        if(!$empresa = Empresa::find($id)){
            return redirect('/')->with('Empresa não encontrada');
        }

        return view('empresas.detalhes', compact('empresa'));
    }

    //classe para a view de logar empresa
    public function create(){
        $user = auth()->user();

        if($user->socio != true){
            return redirect('/')->with('erro', 'Permissão necessária não encontrada');
        }

        return view('empresas.create');
    }

    //classe para criar a equipe
    public function store(StoreEmpresa $request){
        $user = auth()->user();

        if($user->socio != true){
            return redirect('/')->with('erro', 'Permissão necessária não encontrada');
        }

        $valida = $request->validated();

        //verificar se existe imagem
        if($request->hasFile('icone') && $request->file('icone')->isValid()){
            $icone = $request->icone;

            //criptografar o nome do arquivo
            $iconeNome = md5($icone->getClientOriginalName().strtotime("now")).".".$icone->getClientOriginalExtension();

            //definir destino do arquivo
            $destino = public_path('img/empresas/icones');

            //mover arquivo para o diretorio (destino, nomeDoArquivo)
            $icone->move($destino, $iconeNome);

            //definir icone do resquest como o nome do arquivo enviado
            $valida['icone'] = $iconeNome;
        }

        //verificar se existe imagem
        if($request->hasFile('banner') && $request->file('banner')->isValid()){
            $banner = $request->banner;

            //criptografar o nome do arquivo
            $bannerNome = md5($banner->getClientOriginalName().strtotime("now")).".".$banner->getClientOriginalExtension();

            //definir destino do arquivo
            $destino = public_path('img/empresas/banners');

            //mover arquivo para o diretorio (destino, nomeDoArquivo)
            $banner->move($destino, $bannerNome);

            //definir banner do resquest como o nome do arquivo enviado
            $valida['banner'] = $bannerNome;
        }

        $valida['user_id'] = $user->id;

        Empresa::create($valida);

        return redirect('/')->with('success', 'Empresa criada com sucesso!');
    }
}
