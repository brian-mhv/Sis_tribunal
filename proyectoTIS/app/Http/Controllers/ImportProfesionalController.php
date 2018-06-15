<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profesional;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ImportProfesionalController extends Controller {

    public function importProfesionales($file) {
    	Excel::load($file, function($reader) {
 
        foreach ($reader->get() as $profesional) {
          Profesional::create([
            'codigo' => $profesional->codigo,
            'nombre' => $profesional->nombre,
            'apellido_paterno' => $profesional->apellido_paterno,
            'apellido_materno' => $profesional->apellido_materno,
            'titulo' => $profesional->titulo,
            'cod_docente' => $profesional->cod_docente,
            'correo' => $profesional->correo
          ]);
        }
      });
    return Profesional::all();
    }
}