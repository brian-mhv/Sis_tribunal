<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\EstCarrera;
use App\Http\Requests;

class Estudiante extends Model
{
    protected $table='estudiante';
    protected $primaryKey='codigo';
    public $timestamps=false;

    public function addEstCarrera(Request $request){
        $codigo = \DB::table('estudiante')->select('codigo')->get();
        $id = $codigo[count($codigo) - 1];
        $estcarrera = new EstCarrera;
        $estcarrera->cod_est = $id->codigo;
        $estcarrera->cod_carrera = $request->input('carrera');
        $estcarrera->save();
    }
    public function addSesion(){
        $codigo = \DB::table('estudiante')->select('codigo', 'correo')->get();
        $id = $codigo[count($codigo) - 1];
        $sesion = new Sesion;
        $sesion->usuario = $id->codigo;
        $sesion->correo = $id->correo;
        $sesion->pass = "hashtag";
        $sesion->nivel = 4;
        $sesion->save();
    }
}
