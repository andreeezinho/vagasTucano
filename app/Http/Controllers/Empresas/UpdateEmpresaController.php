<?php

namespace App\Http\Controllers\Empresas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//importando request
use App\Http\Requests\StoreEmpresa;

//importando model
use App\Models\Empresa;

class UpdateEmpresaController extends Controller
{
    //verificacoes
    private function verificacoes($id){
        $user = auth()->user();

        if(!$empresa = Empresa::find($id)){
            return redirect('/')->with('erro', 'Empresa não encontrada');
        }

        if($empresa->user_id != $user->id){
            return redirect('/')->with('erro', 'Permissão necessária não encontrada');
        }
    }

    //classe de mostrar view de editar empresa
    public function edit($id){  
        $verifica = $this->verificacoes($id);
        if($verifica){
            return $verifica;
        }

        $empresa = Empresa::find($id);

        return view('empresas.edit', compact('empresa'));
    }

    //classe para atualizar empresa
    public function update(StoreEmpresa $request, $id){
        $verifica = $this->verificacoes($id);
        if($verifica){
            return $verifica;
        }

        $empresa = Empresa::find($id);

        $valida = $request->only([
            'nome',
            'cnpj',
            'endereco',
            'telefone',
            'descricao'
        ]);

        if($request->icone){
            //verificar se existe imagem
            if($request->hasFile('icone') && $request->file('icone')->isValid()){
                //remover arquivo do de icone do usuario
                unlink(public_path('img/empresas/icones/'.$empresa->icone));

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
        }
        if($request->banner){
            //verificar se existe imagem
            if($request->hasFile('banner') && $request->file('banner')->isValid()){
                //remover arquivo do de icone do usuario
                unlink(public_path('img/empresas/banners/'.$empresa->banner));

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
        }

        $empresa->update($valida);
        
        return redirect()->back()->with('success', 'Empresa atualizada!');
    }

    //classe para excluir empresa
    public function destroy($id){
        $verifica = $this->verificacoes($id);
        if($verifica){
            return $verifica;
        }

        $empresa = Empresa::find($id);

        if($empresa->icone != "default.png"){
            //excluir imagem de perfil
            unlink(public_path('img/empresas/icones/'.$empresa->icone));
        }

        if($empresa->banner){
            //excluir imagem de perfil
            unlink(public_path('img/empresas/banners/'.$empresa->banner));
        }

        $empresa->delete();

        return redirect()->back()->with('success', 'Empresa deletada');
    }
}
