<?php

namespace App\Http\Controllers\Empresas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //classe para a view principal
    public function dashboard($id){
        return view('empresas.dashboard');
    }
}
