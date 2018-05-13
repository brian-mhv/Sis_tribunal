<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
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
        return view('proyectos.registrarProy');
    }
    public function addLote(){
        return view('proyectos.registrarProyLote');
    }
    public function save(){

    }
}
