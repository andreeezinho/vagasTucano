<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //define quais dados podem ser passados
    protected $fillable = [
        'user_id',
        'nome',
        'descricao',
        'cnpj',
        'endereco',
        'telefone',
        'icone',
        'banner'
    ];

    public function vagas(){
        return $this->hasMany('App\Models\Vaga');
    }
}
