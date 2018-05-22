<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;


class Sesion extends Model
{
    protected $table='sesion';
    public $timestamps=false;

    public function searchUser(Request $request){
        $sesion = \DB::table('sesion')->select('correo', 'nivel')
        ->where('correo', '=', $request->input('correo'))
        ->where('pass', '=', $request->input('pass'))->get();
        if(count($sesion) > 0){
            $profesionales = $this->getUser($sesion[0]->nivel, $sesion[0]->correo);
            return $profesionales; 
        }
        return null;
    }

    public function getUser($nivel, $correo){
        if($nivel == 1){
            $usuario = \DB::table('sesion')->select('correo', 'usuario', 'nivel')->where('nivel', $nivel)
            ->where('correo', $correo)->get();
            return $usuario;
        }
        if($nivel == 2){
            $profesionales=\DB::table('profesional')->join('sesion', 'sesion.correo', 'profesional.correo')
            ->join('docente', 'docente.codigo', '=', 'profesional.cod_docente')
            ->join('titulo', 'titulo.codigo', 'profesional.titulo')
            ->select('profesional.*', 'docente.*', 'sesion.nivel', 'titulo.nombre as titulo')
            ->where('profesional.correo', '=', $correo)->get();
            return $profesionales;
        }
        if($nivel == 3){
            $profesionales=\DB::table('profesional')->join('sesion', 'sesion.correo', 'profesional.correo')
            ->select('profesional.*','sesion.nivel')->where('profesional.correo', '=', $correo)->get();
            return $profesionales;
        }
        if($nivel == 4){
            $estudiante=\DB::table('estudiante')->join('sesion', 'sesion.correo', 'estudiante.correo')
            ->join('esttesis', 'esttesis.cod_alumno', 'sesion.usuario')
            ->join('tesis', 'tesis.codigo', 'esttesis.cod_tes')
            ->join('proftesis', 'proftesis.cod_tesis', 'tesis.codigo')
            ->join('profesional', 'profesional.codigo', 'proftesis.cod_prof')
            ->join('modalidad', 'modalidad.codigo', 'tesis.cod_modalidad')
            ->select('profesional.*', 'estudiante.*', 'tesis.*','profesional.nombre as nombre_prof', 
            'estudiante.nombre as nombre_est', 'modalidad.nombre as modalidad', 'profesional.correo as correo_prof',
            'sesion.nivel')->get();
            return $estudiante;
            /*$tesis = \DB::table('tesis')->join('modalidad', 'modalidad.codigo', '=', 'tesis.cod_modalidad')
            ->join('proftesis', 'proftesis.cod_tesis', 'tesis.codigo')
            ->join('esttesis', 'esttesis.cod_tes', 'tesis.codigo')
            ->join('profesional', 'profesional.codigo', '=', 'proftesis.cod_prof')
            ->join('estudiante', 'estudiante.codigo', '=', 'esttesis.cod_alumno')
            ->select('tesis.codigo', 'tesis.codigo_tesis', 'tesis.nombre', 'tesis.estado', 
            'modalidad.nombre as cod_modalidad', 'profesional.nombre as cod_prof', 
            'profesional.apellido_paterno', 'profesional.apellido_materno', 'estudiante.nombre as cod_alumno', 
            'estudiante.apellido_pat', 'estudiante.apellido_mat')->get();
            return $tesis;*/
        }
    }

        
}
