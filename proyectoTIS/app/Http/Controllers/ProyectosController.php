<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Profesional;
use App\Estudiante;
use App\Carrera;
use App\Area;
use App\Http\Requests;

class ProyectosController extends Controller
{
    public function index(){
        $proyecto = new Proyecto;
        return view('proyectos.index', compact('proyectos'), ['proyectos'=>$proyecto->getAll()]);
    }
    public function add(){
        $tutor = new Profesional;
        $area = new Area;
        $postulante = new Estudiante;
        $carrera = new Carrera;
        return view('proyectos.registrarProy', ['tutores'=>$tutor->all(), 
        'carreras'=>$carrera->all(), 'postulantes'=>$postulante->all(), 'areas'=>$area->all()]);
    }
    public function addLote(){
        return view('proyectos.registrarProyLote');
    }
    public function save(Request $request){
        $this->validate($request, [
            'proyecto' => 'required|string',
            'codtesis' => 'required|string',
            'carrera' => 'required',
            'modalidad' => 'required'
            ]);
            $proyecto = new Proyecto;
            $proyecto->codigo_tesis = $request->input('codtesis');
            $proyecto->nombre = $request->input('proyecto');
            $proyecto->descripcion = $request->input('descripcion');
            $proyecto->estado = $request->input('estado');
            $proyecto->obj_gral = $request->input('objetivo');
            $proyecto->fecha_registro = $request->input('fecha');
            $proyecto->cod_modalidad = $request->input('modalidad');
            $proyecto->carrera = $request->input('carrera');
            $proyecto->save();
            $proyecto->saveProject($request);
            return view('proyectos.index', compact('proyectos'), ['proyectos'=>$proyecto->all()]);
    }
}
