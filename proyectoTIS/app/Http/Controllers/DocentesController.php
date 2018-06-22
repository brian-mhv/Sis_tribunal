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
        if($this->getUser() && $this->getUser()[0]->nivel <= 2){
            $area = new Area;
            return view('docentes.registrarProf', compact('docentes'), ['areas'=>$area->all(), 'user'=>$this->getUser()]);
        }
        return view('help', ['user'=>$this->getUser()]);
    }
    public function addLote(){
        if($this->getUser() && $this->getUser()[0]->nivel <= 2){
            return view('docentes.registrarProfLote', ['user'=>$this->getUser()]);
        }
        return view('help', ['user'=>$this->getUser()]);
    }
    public function save(Request $request){
        if(count($request->file()) > 0){
          if($this->getUser() && $this->getUser()[0]->nivel <= 2){
            $docente = new Docente;
            $file = $request->file('file');
            $docente->importDocentes($file);
            return view('docentes.index', compact('docentes'), ['docentes'=>$docente->getAll(), 'user'=>$this->getUser()]);
          }
          return view('help', ['user'=>$this->getUser()]);
        }
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
        $docente->save();
        $docente->addProfesional($request);
        $docente->addSesion();
        $prof = new Profesional;
        return view('docentes.index', compact('docentes'), ['docentes'=>$prof->getAll(), 'user'=>$this->getUser()]);
    }
}