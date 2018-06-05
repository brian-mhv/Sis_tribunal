<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Profesional;
use App\Estudiante;
use App\Carrera;
use App\Area;
use App\ProfTesis;
use App\AreaTesis;
use App\Http\Requests;

class ProyectosController extends Controller
{
    public function index(){
        $proyecto = new Proyecto;
        return view('proyectos.index', ['proyectos'=>$proyecto->getAll(), 'user'=>$this->getUser()]);
    }
    public function add(){
        if($this->getUser() && $this->getUser()[0]->nivel == 1){
            $tutor = new Profesional;
            $area = new Area;
            $postulante = new Estudiante;
            $carrera = new Carrera;
            return view('proyectos.registrarProy', ['tutores'=>$tutor->all(), 
            'carreras'=>$carrera->all(), 'postulantes'=>$postulante->all(), 'areas'=>$area->all(), 'user'=>$this->getUser()]);
        }
        return view('home', ['user'=>$this->getUser()]);
    }
    public function addLote(){
        if($this->getUser() && $this->getUser()[0]->nivel == 1){
            return view('proyectos.registrarProyLote', ['user'=>$this->getUser()]);
        }
        return view('home', ['user'=>$this->getUser()]);
    }
    public function save(Request $request){
        $proyecto = new Proyecto;
        $profTesis = new ProfTesis;
        $areaTesis = new AreaTesis;
        if(count($request->file()) > 0){

            $proftesis = $request->file('proftesis');
            $profTesis->importProfTesis($proftesis);
            return view('proyectos.index', compact('proyectos'), ['proyectos'=>$proyecto->getAll(), 'user'=>$this->getUser()]);
        }

        $this->validate($request, [
            'proyecto' => 'required|string',
            'codtesis' => 'required|string',
            'carrera' => 'required',
            'modalidad' => 'required'
            ]);
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
            return view('proyectos.index', compact('proyectos'), ['proyectos'=>$proyecto->all(), 'user'=>$this->getUser()]);
    }
}
