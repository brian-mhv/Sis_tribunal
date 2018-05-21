<?php

namespace App;

use Illuminate\Http\Request;
use App\AreasProfesional;
use App\Profesional;
use App\Sesion;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table='docente';
    protected $table2='profesional';
    protected $primaryKey='codigo';
    public $timestamps=false;

    public function getAll(){
        $profesionales=\DB::table('profesional')->join('titulo', 'titulo.codigo', '=', 'profesional.titulo')
        ->join('docente', 'docente.codigo', '=', 'profesional.cod_docente')
        ->select('docente.*', 'profesional.*', 'titulo.nombre as titulo')->where('cod_docente', '>', 0)->get();
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
        $this->addAreas($request);
    }
    public function addAreas(Request $request){
        $codigo = \DB::table('profesional')->select('codigo')->get();
        $id = $codigo[count($codigo) - 1];
        foreach($request->input('area') as $area){
            $areasprof = new AreasProfesional;
            $areasprof->id_profesional = $id->codigo;
            $areasprof->id_area = $area;
            $areasprof->save();
        }
    }
    public function addSesion(){
        $codigo = \DB::table('profesional')->select('codigo', 'correo')->get();
        $id = $codigo[count($codigo) - 1];
        $sesion = new Sesion;
        $sesion->usuario = $id->codigo;
        $sesion->correo = $id->correo;
        $sesion->pass = "hashtag";
        $sesion->nivel = 2;
        $sesion->save();
    }
}
