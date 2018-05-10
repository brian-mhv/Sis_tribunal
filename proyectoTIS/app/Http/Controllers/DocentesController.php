<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Http\Requests;

class DocentesController extends Controller
{
    public function index(){
        $docentes = new Docente;
        return view('docente.index', compact('docente'), ['profesionales'=>$docentes->getAll()]);
    }
    public function add(){
        //$profesionales = new Profesional;
        return view('docente.registrarProf');//, compact('docentes'), ['areas'=>$profesionales->docentes()]);
    }
    public function addLote(){
        return view('docente.registrarProfLote');
    }
}
