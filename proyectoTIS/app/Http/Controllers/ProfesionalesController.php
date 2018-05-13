<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesional;
use App\Area;
use App\Http\Requests;

class ProfesionalesController extends Controller
{
    public function invitados(){
        $invitado = new Profesional;
        return view('invitados.index', compact('invitados'), ['invitados'=>$invitado->invitados()]);
    }
    public function add(){
        $area = new Area;
        return view('invitados.registrar' , compact('invitados'), ['areas'=>$area->all()]);//, compact('docentes'), ['areas'=>$profesionales->docentes()]);
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
