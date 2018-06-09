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
            $res = $areas->getByFilter($request->area);
        }
        return view('tribunales.registrar', compact('tribunales'), 
        ['profesional'=>$profesionales->all(), 'proyecto'=>$proyectos->getProject($idTesis), 
         'areas'=>$proyectos->getAreas($idTesis),'user'=>$this->getUser(), 'filter'=>$res]);
    }
    public function save(Request $request){
        $this->validate($request, [
            'profesional1' => 'required',
            'profesional2' => 'required',
            'profesional3' => 'required',
            'tesis' => 'required',
            'fecha' => 'required'
            ]);
        $tribunales = new Tribunal;
        $tribunales->id_tesis = $request->input('tesis');
        $tribunales->id_profesional1 = $request->input('profesional1');
        $tribunales->id_profesional2 = $request->input('profesional2');
        $tribunales->id_profesional3 = $request->input('profesional3');
        $tribunales->fecha_defensa = $request->input('fecha');
        $tribunales->save();
        //mandar correo 
        $profesionales = $tribunales->getProf();
        return view('tribunales.index', compact('tribunales'), 
        ['tribunal'=>$tribunales->getAll(), 'profesional'=>$profesionales, 'user'=>$this->getUser()]);
    }
}
