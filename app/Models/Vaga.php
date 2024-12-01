<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    //define quais dados possem se enviados 
    protected $fillable = [
        'empresa_id',
        'nome',
        'descricao',
        'status',
        'tipo',
        'data_fechamento'
    ];

    //define que uma vaga pode ter varios usuarios
    public function candidatos(){
        return $this->belongsToMany('App\Models\User');
    }

    //define que uma vaga pertence a empresa
    public function vagaPertenceEmpresa(){
        return $this->belongsToMany('App\Models\User');
    }

    //define que vaga possui varias entrevistas
    public function entrevista(){
        return $this->hasMany('App\Models\Entrevista');
    }
}
