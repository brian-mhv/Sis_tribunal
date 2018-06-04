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
 
<<<<<<< HEAD
        foreach ($reader->get() as $profesional) {
            Profesional::create([
                'codigo' => $profesional->codigo,
                'nombre' => $profesional->nombre,
                'ape_pat' => $profesional->ape_pat,
                'ape_mat' => $profesional->ape_mat,
                'titulo' => $profesional->titulo,
                'correo' => $profesional->correo,
                'cod_docente' => $profesional->cod_docente
            ]);
        }});
        return Profesional::all();
=======
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
>>>>>>> 4cd14dbee626174a8913bf10ba86688ea398d3ac
    }
}
