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
        return view('invitados.index', compact('invitados'), ['invitados'=>$invitado->invitados(), 'user'=>$this->getUser()]);
    }
    public function add(){
        if($this->getUser() && $this->getUser()[0]->nivel == 1){
            $area = new Area;
            return view('invitados.registrar' , compact('invitados'), ['areas'=>$area->all(), 'user'=>$this->getUser()]);
        }
        return view('home', ['user'=>$this->getUser()]);
    }
    public function addLote(){
        if($this->getUser() && $this->getUser()[0]->nivel == 1){
            return view('invitados.registrarLote', ['user'=>$this->getUser()]);
        }
        return view('home', ['user'=>$this->getUser()]);
    }
    public function save(Request $request){
        $this->validate($request, [
        'nombre' => 'required|string',
        'apPat' => 'required|string',
        'apMat' => 'required|string',
        ]);
        $invitado = new Profesional;
        $invitado->nombre = $request->input('nombre');
        $invitado->apellido_paterno = $request->input('apPat');
        $invitado->apellido_materno = $request->input('apMat');
        $invitado->correo = $request->input('correo');
        $invitado->titulo = $request->input('titulo');
        $invitado->save();
        $invitado->addArea($request->input('area'));
        $invitado->addSesion();
        return view('invitados.index', compact('invitados'), ['invitados'=>$invitado->invitados(), 'user'=>$this->getUser()]);
    }
}
