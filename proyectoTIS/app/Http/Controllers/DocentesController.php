<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Profesional;
use App\Area;
use App\Http\Requests;

class DocentesController extends Controller
{
    public function index(){
        $docente = new Docente;
        return view('docentes.index', compact('docentes'), ['docentes'=>$docente->getAll()]);
    }
    public function add(){
        $area = new Area;
        return view('docentes.registrarProf', compact('docentes'), ['areas'=>$area->all()]);
    }
    public function addLote(){
        return view('docentes.registrarProfLote');
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
        $id = $docente->addProfesional($request);
        return view('docentes.index', compact('docentes'), ['docentes'=>$docente->getAll()]);
    }
}