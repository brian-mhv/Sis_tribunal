<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesional;
use App\Http\Requests;

class ProfesionalesController extends Controller
{
    public function __construct()
    {

    }
    /*public function index(){
        $profesionales = new Profesional;
        return view('profesional.index', compact('profesionales'), ['areas'=>$profesionales->all()]);
    }
    public function invitados(){
        //$profesionales = new Profesional;
        return view('invitados.index');//, compact('invitados'), ['areas'=>$profesionales->invitados()]);
    }*/
    public function invitados(){
        $invitado = new Profesional;
        return view('invitados.index', compact('invitados'), ['invitados'=>$invitado->invitados()]);
    }
    public function add(){
        
        return view('invitados.registrar');//, compact('docentes'), ['areas'=>$profesionales->docentes()]);
    }
    public function addLote(){
        //$profesionales = new Profesional;
        return view('invitados.registrarLote');//, compact('docentes'), ['areas'=>$profesionales->docentes()]);
    }
    public function save(Request $request){
        $this->validate($request, [
        'nombre' => 'required|string',
        'apPat' => 'required|string',
        'apMat' => 'required|string',
        'correo' => 'required|string',
        'titulo' => 'required|Int'
        ]);
        $invitado = new Profesional;
        $invitado->nombre = $request->input('nombre');
        $invitado->apellido_paterno = $request->input('apPat');
        $invitado->apellido_materno = $request->input('apMat');
        $invitado->correo = $request->input('correo');
        $invitado->titulo = $request->input('titulo');
        $invitado->save();
        return view('invitados.index', compact('invitados'), ['invitados'=>$invitado->invitados()]);
    }
}
