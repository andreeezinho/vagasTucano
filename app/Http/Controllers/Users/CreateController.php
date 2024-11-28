<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//importar request StoreUser
use App\Http\Requests\StoreUser;

//importar model do user
use App\Models\User;

class CreateController extends Controller
{
    //view de registrar usuario
    public function create(){
        return view('users.create');
    }

    //cadastrar o usuario no banco de dados
    public function store(StoreUser $request){
        //validar dados
        $valida = $request->validated();

        //verificar se existe imagem
        if($request->hasFile('icone') && $request->file('icone')->isValid()){
            $icone = $request->icone;

            //criptografar o nome do arquivo
            $iconeNome = md5($icone->getClientOriginalName().strtotime("now").".".$icone->getClientOriginalExtension());

            //definir destino do arquivo
            $destino = public_path('img/users');

            //mover arquivo para o diretorio (destino, nomeDoArquivo)
            $icone->move($destino, $iconeNome);

            //definir icone do resquest como o nome do arquivo enviado
            $valida['icone'] = $iconeNome;
        }

        User::create($valida);


        return redirect('/login')->with('success', 'Cadastro feito com sucesso!');
    }
}
