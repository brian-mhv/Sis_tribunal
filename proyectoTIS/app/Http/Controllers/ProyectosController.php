<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Profesional;
use App\Estudiante;
use App\Carrera;
use App\Area;
use App\ProfTesis;
use App\EstTesis;
use App\AreaTesis;
use App\Http\Requests;

class ProyectosController extends Controller
{
    public function index(Request $request){
        $proyecto = new Proyecto;
        if($request->input('filtro')){
            $proy = [];
            foreach($proyecto->getAll() as $tesis){
                if(stristr($tesis->codigo, $request->input('filtro')) || 
                stristr("{$tesis->cod_prof} {$tesis->apellido_paterno} {$tesis->apellido_materno}", $request->input('filtro')) || 
                stristr("{$tesis->cod_alumno} {$tesis->apellido_pat} {$tesis->apellido_mat}", $request->input('filtro')) || 
                stristr($tesis->nombre, $request->input('filtro')) || stristr($tesis->cod_modalidad, $request->input('filtro'))){
                    array_push( $proy , $tesis);   
                }
            }
            return view('proyectos.index', ['proyectos'=>$proy, 'user'=>$this->getUser()]);
        }
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
        return view('help', ['user'=>$this->getUser()]);
    }
    public function addLote(){
        if($this->getUser() && $this->getUser()[0]->nivel == 1){
            return view('proyectos.registrarProyLote', ['user'=>$this->getUser()]);
        }
        return view('help', ['user'=>$this->getUser()]);
    }
    public function save(Request $request){
        $this->validate($request, [
            //'proyectos' => 'required',
            /*'proftesis' => 'required',
            'esttesis' => 'required',
            'areastesis' => 'required',*/
            ]);
        $proyecto = new Proyecto;
        $profTesis = new ProfTesis;
        $estTesis = new EstTesis;
        $areaTesis = new AreaTesis;
        set_time_limit(1000);
        if(count($request->file()) > 0){
          if($this->getUser() && $this->getUser()[0]->nivel == 1){
            if($request->file('proyectos') != NULL){
                $project = $request->file('proyectos');
                $proyecto->importProyectos($project);
            }
            if($request->file('proftesis') != NULL){
                $proftesis = $request->file('proftesis');
                $profTesis->importProfTesis($proftesis);
            }
            if($request->file('esttesis') != NULL){
                $esttesis = $request->file('esttesis');
                $estTesis->importEstTesis($esttesis);
            }
            if($request->file('areastesis') != NULL){
                $areastesis = $request->file('areastesis');
                $areaTesis->importAreaTesis($areastesis);
            }
            return view('proyectos.index', compact('proyectos'), ['proyectos'=>$proyecto->getAll(), 'user'=>$this->getUser()]);
          }
          return view('help', ['user'=>$this->getUser()]);
        }
    }
}
