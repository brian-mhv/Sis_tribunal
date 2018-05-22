<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Docente;
use App\Profesional;
use App\Area;
use App\Http\Requests;

class DocentesController extends Controller
{
    public function index(){
        $docente = new Docente;
        return view('docentes.index', compact('docentes'), ['docentes'=>$docente->getAll(), 'user'=>$this->getUser()]);
    }
    public function add(){
        if($this->getUser() && $this->getUser()[0]->nivel == 1){
            $area = new Area;
            return view('docentes.registrarProf', compact('docentes'), ['areas'=>$area->all(), 'user'=>$this->getUser()]);
        }
        return view('home', ['user'=>$this->getUser()]);
    }
    public function addLote(){
        if($this->getUser() && $this->getUser()[0]->nivel == 1){
            return view('docentes.registrarProfLote', ['user'=>$this->getUser()]);
        }
        return view('home', ['user'=>$this->getUser()]);
    }
    public function save(Request $request){
        $this->validate($request, [
        'nombre' => 'required|string',
        'apPat' => 'required|string',
        'apMat' => 'required|string',
        'correo' => 'required|string',
        'titulo' => 'required|Int'
        ]);
        $docente = new Docente;
        $docente->carga_horaria = $request->input('carga');
        $docente->telefono = $request->input('telefono');
        $docente->direccion = $request->input('direccion');
        $docente->ci = $request->input('carnet');
        $docente->save();
        $docente->addProfesional($request);
        $docente->addSesion();
        return view('docentes.index', compact('docentes'), ['docentes'=>$docente->getAll(), 'user'=>$this->getUser()]);
    }
}