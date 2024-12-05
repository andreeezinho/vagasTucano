<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrevista extends Model
{
    //definindo quais dados podem ser passados
    protected $fillable = [
        'vaga_id',
        'status',
        'data',
        'hora',
        'local'
    ];

    //define que uma entrevista tem varios usuarios
    public function entrevista(){
        return $this->belongsToMany('App\Models\User');
    }

    //define que entrevista pertence a vaga
    public function vaga(){
        return $this->belongsTo('App\Models\Vaga');
    } 
}
