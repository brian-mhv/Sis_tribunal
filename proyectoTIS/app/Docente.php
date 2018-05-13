<?php

namespace App;

use Illuminate\Http\Request;
use App\Profesional;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table='docente';
    protected $table2='docente';
    protected $primaryKey='codigo';
    public $timestamps=false;

    public function getAll(){
        $profesionales=\DB::table('profesional')->join('titulo', 'titulo.codigo', '=', 'profesional.titulo')
        ->join('docente', 'docente.codigo', '=', 'profesional.cod_docente')->select('profesional.codigo', 'profesional.nombre', 'profesional.apellido_paterno', 
        'profesional.apellido_materno', 'profesional.correo', 'titulo.nombre as titulo', 'docente.carga_horaria', 'docente.telefono',
        'docente.direccion', 'docente.ci')->where('cod_docente', '>', 0)->get();
        return $profesionales;
    }
    public function addProfesional(Request $request){
        $codigo = \DB::table('docente')->select('codigo')->get();
        $id = $codigo[count($codigo) - 1];
        $profesional = new Profesional;
        $profesional->nombre = $request->input('nombre');
        $profesional->apellido_paterno = $request->input('apPat');
        $profesional->apellido_materno = $request->input('apMat');
        $profesional->correo = $request->input('correo');
        $profesional->titulo = $request->input('titulo');
        $profesional->cod_docente = $id->codigo;
        $profesional->save();
    }
}
