<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Area;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ImportAreaController extends Controller
{
    public function import()
    {
    	Excel::load('areas.csv', function($reader) {
 
            foreach ($reader->get() as $area) {
                Area::create([
                    'idArea' =>$area->idArea,
                    'nombre_area' => $area->nombre_area,
                    'descripcion' =>$area->descripcion,
                    'id_subarea' =>$area->id_subarea
                ]);
            }
        });
        return Area::all();
    }
}
