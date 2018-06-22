<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreasProfesional;
use App\Area;
use App\Tribunal;

class PerfilController extends Controller
{
    public function index(){
        $codigo = $this->getUser()[0]->codigo;
        $tribunales = new Tribunal;
        $profesionales = $tribunales->getProf();
        if(count($tribunales->getAll()) == 0){
            return view('tribunales.index', compact('tribunales'), 
            ['tribunal'=>[], 'profesional'=>$profesionales, 'user'=>$this->getUser()]);    
        }
        return view('tribunales.index', compact('tribunales'), 
        ['tribunal'=>$tribunales->getSome($codigo), 'profesional'=>$profesionales, 'user'=>$this->getUser()]);
    }
    public function addAreas(){
        $codigo = $this->getUser()[0]->codigo;
        $areasProf = new AreasProfesional;
        $areas = new Area;
        return view('sesiones.registrarAreas', compact('sesiones'), 
        ['user'=>$this->getUser(), 'areasProf'=>$areasProf->getAreas($codigo), 'areas'=>$areas->all()]);
    }
    public function save(Request $request){
        print_r($request->input("areas[]"));
        $codigo = $this->getUser()[0]->codigo;
        $areasProf = new AreasProfesional;
        return view('sesiones.registrarAreas', compact('sesiones'), 
        ['user'=>$this->getUser(), 'areasProf'=>$areasProf->getAreas($codigo), 'areas'=>$areas->all()]);
    }
}
