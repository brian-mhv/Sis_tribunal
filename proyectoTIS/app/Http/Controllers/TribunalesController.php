<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tribunal;
use App\Profesional;
use App\Proyecto;
use App\Area;
use App\Http\Requests;

class TribunalesController extends Controller
{
    public function index(){
        $tribunales = new Tribunal;
        $profesionales = $tribunales->getProf();
        return view('tribunales.index', compact('tribunales'), 
        ['tribunal'=>$tribunales->getAll(), 'profesional'=>$profesionales, 'user'=>$this->getUser()]);
    }
    public function add($idTesis, Request $request){
        $profesionales = new Profesional;
        $proyectos = new Proyecto;
        $res = NULL;
        if($request->area != NULL){
            $areas = new Area;
            $res = $areas->getByFilter($request->area, $idTesis);
        }
        return view('tribunales.registrar', compact('tribunales'), 
        ['proyecto'=>$proyectos->getProject($idTesis), 'areas'=>$proyectos->getAreas($idTesis),
        'user'=>$this->getUser(), 'filter'=>$res, 'tribunal'=>new Tribunal]);
    }

    public function edit($idTesis){
        $tribunal = new Tribunal;
        $profesionales = $tribunal->getProf();
        $areas = new Area;
        $trib = $tribunal->getTribunal($idTesis);
        $res = $areas->getSustituto($idTesis, $trib);
        return view('tribunales.cambiarTribunal', compact('tribunales'), 
        ['tribunal'=>$trib, 'profesional'=>$profesionales,
        'user'=>$this->getUser(), 'filter'=>$res]);
    }
    public function save(Request $request){
        $tribunales = new Tribunal;
        if($request->input('tesis') != NULL){
            print_r($request->input());
            return view('tribunales.index', compact('tribunales'), 
            ['tribunal'=>$tribunales->getAll(), 'profesional'=>$tribunales->getProf(), 'user'=>$this->getUser()]);
        }
        $tribunales->id_tesis = $request->input('tesis');
        $tribunales->id_profesional1 = $request->input('candidato1');
        $tribunales->id_profesional2 = $request->input('candidato2');
        $tribunales->id_profesional3 = $request->input('candidato3');
        $tribunales->fecha_defensa = $request->input('fecha');
        $tribunales->save();
        $tribunales->addRelation($request);
        $profesionales = $tribunales->getProf();
        return view('tribunales.index', compact('tribunales'), 
        ['tribunal'=>$tribunales->getAll(), 'profesional'=>$profesionales, 'user'=>$this->getUser()]);
    }
}
