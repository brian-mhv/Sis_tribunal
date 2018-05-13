<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Carrera;
use App\Http\Requests;


class EstudiantesController extends Controller
{
    public function index(){
        $estudiante = new Estudiante;
        return view('estudiantes.index', compact('estudiantes'), ['estudiantes'=>$estudiante->all()]);
    }
    public function add(){
        $carrera = new Carrera;
        return view('estudiantes.registrar', compact('estudiantes'), ['carreras'=>$carrera->all()]);
    }
    public function save(Request $request){
        $this->validate($request, [
            'nombre' => 'required|string',
            'apPat' => 'required|string',
            'apMat' => 'required|string',
            'correo' => 'required|string',
            ]);
        $estudiante = new Estudiante;
        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellido_pat = $request->input('apPat');
        $estudiante->apellido_mat = $request->input('apMat');
        $estudiante->correo = $request->input('correo');
        $estudiante->cod_sis = $request->input('sis');
        $estudiante->telefono = $request->input('telefono');
        $estudiante->direccion = $request->input('direccion');
        $estudiante->ci = $request->input('carnet');
        $estudiante->save();
        $estudiante->addEstCarrera($request);
        return view('estudiantes.index', compact('estudiantes'), ['estudiantes'=>$estudiante->all()]);
    }
}
