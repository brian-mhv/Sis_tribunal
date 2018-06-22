<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\EstCarrera;
use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;

class Estudiante extends Model
{
    protected $table='estudiante';
    protected $primaryKey='codigo';
    public $timestamps=false;
    protected $fillable = [
            'codigo',
            'cod_sis',
            'nombre',
            'apellido_pat',
            'apellido_mat',
            'correo',
            'ci'
    ];

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

    public function importEstudiantes($file)
    {
        set_time_limit(400);
    	Excel::load($file, function($reader) {
 
        foreach ($reader->get() as $estudiante) {
        Estudiante::create([
            'codigo' => $estudiante->codigo,
            'nombre' => $estudiante->nombre,
            'apellido_pat' => $estudiante->ape_pat,
            'apellido_mat' => $estudiante->ape_mat,
            'correo' => $estudiante->correo,
            ]);
        }
        });
    }
}
