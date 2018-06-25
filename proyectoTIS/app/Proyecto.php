<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\EstTesis;
use App\ProfTesis;
use App\Modalidad;
use App\Profesional;
use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;


class Proyecto extends Model
{
    protected $table='tesis';
    public $timestamps=false;
    protected $primaryKey = 'codigo';
    protected $fillable =[
        'codigo',
        'nombre',
        'estado',
        'cod_modalidad'
    ];

    public function getAll(){
        $tesis = \DB::table('tesis')->join('modalidad', 'modalidad.codigo', '=', 'tesis.cod_modalidad')
        ->join('proftesis', 'proftesis.cod_tesis', 'tesis.codigo')
        ->join('esttesis', 'esttesis.cod_tes', 'tesis.codigo')
        ->join('profesional', 'profesional.codigo', '=', 'proftesis.cod_prof')
        ->join('estudiante', 'estudiante.codigo', '=', 'esttesis.cod_alumno')
        ->select('tesis.*',
        'modalidad.nombre as cod_modalidad', 'profesional.nombre as cod_prof', 
        'profesional.apellido_paterno', 'profesional.apellido_materno', 'estudiante.nombre as cod_alumno', 
        'estudiante.apellido_pat', 'estudiante.apellido_mat')
        ->where('proftesis.tipo_resp', 1)->orderBy('tesis.codigo', 'asc')->distinct()->get();
        return $tesis;
    }

    public function getProject($idTesis){
        $tesis = \DB::table('tesis')->join('modalidad', 'modalidad.codigo', '=', 'tesis.cod_modalidad')
        ->join('proftesis', 'proftesis.cod_tesis', 'tesis.codigo')
        ->join('esttesis', 'esttesis.cod_tes', 'tesis.codigo')
        ->join('profesional', 'profesional.codigo', '=', 'proftesis.cod_prof')
        ->join('estudiante', 'estudiante.codigo', '=', 'esttesis.cod_alumno')
        ->select('tesis.*',
        'modalidad.nombre as cod_modalidad', 'profesional.nombre as cod_prof', 
        'profesional.apellido_paterno', 'profesional.apellido_materno', 'estudiante.nombre as cod_alumno', 
        'estudiante.apellido_pat', 'estudiante.apellido_mat')
        ->where('tesis.codigo', $idTesis)->where('proftesis.tipo_resp', 1)->get();
        return $tesis;
    }
    public function getAreas($idTesis){
        $tesis = \DB::table('tesis')
        ->join('areatesis', 'areatesis.id_tesis', '=', 'tesis.codigo')
        ->join('area', 'area.idArea', 'areatesis.id_area')
        ->select('area.*')->where('tesis.codigo', $idTesis)->get();
        return $tesis;
    }
    public function saveProject(Request $request){
        $codigo = \DB::table('tesis')->select('codigo')->get();
        $id = $codigo[count($codigo) - 1];
        $estTesis = new EstTesis;
        $estTesis->cod_alumno = $request->input('estudiante');
        $estTesis->cod_tes = $id->codigo;
        $estTesis->save();
        $profTesis = new ProfTesis;
        $profTesis->cod_prof = $request->input('tutor');
        $profTesis->cod_tesis = $id->codigo;
        $profTesis->save();
    }
    public function importProyectos($file)
    {
    	Excel::load($file, function($reader) {
 
        foreach ($reader->get() as $proyecto) {
        Proyecto::create([
            'codigo' => $proyecto->codigo,
            'nombre' => $proyecto->nombre,
            'estado' => 1,
            'cod_modalidad' => $proyecto->cod_mod
            ]);
        }
        });
        $prof = new Profesional;
        $prof->addAreaLote();

    }
}
