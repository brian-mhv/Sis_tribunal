<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreasProfesional;
use App\Area;

class PerfilController extends Controller
{
    public function addAreas(){
        $codigo = $this->getUser()[0]->codigo;
        $areasProf = new AreasProfesional;
        $areas = new Area;
        return view('sesiones.registrarAreas', compact('sesiones'), 
        ['user'=>$this->getUser(), 'areasProf'=>$areasProf->getAreas($codigo), 'areas'=>$areas->all()]);
    }
}
