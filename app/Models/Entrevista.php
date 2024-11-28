<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrevista extends Model
{
    //definindo quais dados podem ser passados
    protected $fillable = [
        'vaga_id',
        'status',
        'data_agendada',
        'local'
    ];

    //define que uma entrevista tem varios usuarios
    public function entrevista(){
        return $this->belongsToMany('App\Models\User');
    }
}
