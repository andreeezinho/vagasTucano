<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    //view de registrar usuario
    public function create(){
        return view('users.create');
    }
}
