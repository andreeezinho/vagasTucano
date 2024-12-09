<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//importando metodo de autenticacao
use Illuminate\Support\Facades\Auth;

//importando model
use App\Models\User;

//importando request de editar
use App\Http\Requests\UpdateUser;

class UpdateController extends Controller
{
    //classe da view de editar user
    public function edit(){
        $user = auth()->user();
        
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUser $request){
        $user = auth()->user();

        //fazer request somente dos dados
        $valida = $request->only([
            'name',
            'cpf',
            'telefone',
            'email',
            'socio'
        ]);

        //verifica se usuario informou icone
        if($request->icone){
            //verificar se existe imagem
            if($request->hasFile('icone') && $request->file('icone')->isValid()){
                //remover arquivo do de icone do usuario
                unlink(public_path('img/users/'.$user->icone));

                $icone = $request->icone;

                //criptografar o nome do arquivo
                $iconeNome = md5($icone->getClientOriginalName().strtotime("now")).".".$icone->getClientOriginalExtension();

                //definir destino do arquivo
                $destino = public_path('img/users');

                //mover arquivo para o diretorio (destino, nomeDoArquivo)
                $icone->move($destino, $iconeNome);

                //definir icone do resquest como o nome do arquivo enviado
                $valida['icone'] = $iconeNome;
            }
        }

        //verifica se usuario informou senha
        if($request->password){
            //criptografar senha com bcrypt
            $valida['password'] = bcrypt($request->password);
        }

        //fazer update
        $user->update($valida);

        return redirect()->back()->with('success', 'Seu perfil foi editado');
    }

    //classe para excluir usuario
    public function destroy(){
        $user = auth()->user();

        //se icone nao for default
        if($user->icone != "default.png"){
            //excluir imagem de perfil
            unlink(public_path('img/users/'.$user->icone));
        }

        //percorrer todos os curriclos onde se candidatou
        foreach($user->userVagas as $vaga){
            //pegar somente curriculo na relacao n:n
            $curriculo = $vaga->pivot->curriculo;

            //excluir do diretorio
            unlink(public_path('vagas/curriculos/'.$curriculo));
        }

        //logout do usuario
        Auth::logout();

        //deleta usuario
        $user->delete();

        return redirect('/')->with('success', 'Conta excluída');
    }

}
