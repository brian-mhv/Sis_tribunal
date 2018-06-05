<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profesional;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ImportProfesionalController extends Controller
{
    public function import()
    {
    	Excel::load('profesionales.csv', function($reader) {
 
     foreach ($reader->get() as $profesional) {
     Profesional::create([
        'codigo' => $profesional->codigo,
        'nombre' => $profesional->nombre,
        'apellido_paterno' => $profesional->ape_pat,
        'apellido_materno' => $profesional->ape_mat,
        'titulo' => $profesional->cod_tit,
        'correo' => $profesional->correo,
        'cod_docente' => $profesional->cod_docente
     ]);
       }
 });
 return Profesional::all();
    }

    public function importProfesionales($file)
    {
    	Excel::load($file, function($reader) {
 
     foreach ($reader->get() as $profesional) {
     Profesional::create([
        'codigo' => $profesional->codigo,
        'nombre' => $profesional->nombre,
        'apellido_paterno' => $profesional->apellido_paterno,
        'apellido_materno' => $profesional->apellido_materno,
        'titulo' => $profesional->titulo,
        'correo' => $profesional->correo,
        'cod_docente' => $profesional->cod_docente
     ]);
       }
 });
 return Profesional::all();
    }
}
