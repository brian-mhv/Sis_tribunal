<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreasProfesional extends Model
{
    protected $table="areasprofesional";
    public $timestamps=false;

    public function getAreas($codigo){
        $areas = \DB::table('areasprofesional')->join('area', 'area.idArea', 'areasprofesional.id_area')
        ->select('area.*')->where('areasprofesional.id_profesional', $codigo)->get();
        return $areas;
    }

    
}
