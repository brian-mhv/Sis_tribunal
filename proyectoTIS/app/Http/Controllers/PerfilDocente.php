<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilDocente extends Controller
{
    public function addAreas(){
        return view('sesiones.registrarAreas', compact('sesiones'), ['user'=>$this->getUser()]);
    }
}
