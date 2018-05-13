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
    public function __construct()
    {
    }
    public function index(){
        $proyecto = new Proyecto;
        return view('proyectos.index', compact('proyectos'), ['proyectos'=>$proyecto->all()]);
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
    public function save(){
        
    }
}
