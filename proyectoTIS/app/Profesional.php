<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProfTesis;
use App\AreaTesis;
use App\AreasProfesional;
use Maatwebsite\Excel\Facades\Excel;

class Profesional extends Model
{
    protected $table='profesional';
    protected $primaryKey='codigo';
    public $timestamps=false;

    protected $fillable =[
        'codigo',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'titulo',
        'correo',
        'cod_docente'
    ];
    protected $guarded =[];

    public function getAll(){
        $profesionales=\DB::table('profesional')->join('titulo', 'titulo.codigo', 'profesional.titulo')
        ->select('profesional.*', 'titulo.nombre as titulo')->orderBy('profesional.codigo', 'asc')->get();
        return $profesionales;
    }
    public function invitados(){
        $invitados=\DB::table('profesional')->join('titulo', 'titulo.codigo', 'profesional.titulo')
        ->select('profesional.*', 'titulo.nombre as titulo')->where('cod_docente', '=', null)
        ->orderBy('profesional.codigo', 'asc')->get();
        return $invitados;
    }

    public function addSesion(){
        $codigo = \DB::table('profesional')->select('codigo', 'correo')->get();
        $id = $codigo[count($codigo) - 1];
        $sesion = new Sesion;
        $sesion->usuario = $id->codigo;
        $sesion->correo = $id->correo;
        $sesion->pass = "hashtag";
        $sesion->nivel = 3;
        $sesion->save();
    }

    public function addArea($area){
        $codigo = \DB::table('profesional')->select('codigo')->get();
        $id = $codigo[count($codigo) - 1];
        if($area != 0){
            $areasprof = new AreasProfesional;
            $areasprof->id_profesional = $id->codigo;
            $areasprof->id_area = $area;
            $areasprof->save();
        }
    }
    public function importProfesionales($file1, $file2){
      $file = $file1;
      if($file2->getClientOriginalName() == "profesionales.csv"){$file = $file2;}
      Excel::load($file, function($reader) {
 
        foreach ($reader->get() as $profesional) {
            Profesional::create([
            'codigo' => $profesional->codigo,
            'nombre' => $profesional->nombre,
            'apellido_paterno' => $profesional->ape_pat,
            'apellido_materno' => $profesional->ape_mat,
            'titulo' => $profesional->cod_tit,
            'correo' => $profesional->correo,
            'cod_docente' => $profesional->cod_docente
            ]);
            $this->addNewSesion($profesional->codigo, $profesional->correo);
        }
      });
    }

    public function addNewSesion($codigo, $correo){
        if($correo != ""){
            $sesion = new Sesion;
            $sesion->usuario = $codigo;
            $sesion->correo = $correo;
            $sesion->nivel = 3;
            $sesion->save();
        }
    }

    public function addAreaLote(){
        $areas = \DB::table('areatesis')
        ->join('proftesis', 'proftesis.cod_tesis', 'areatesis.id_tesis')
        ->select('areatesis.id_area', 'proftesis.cod_prof')->distinct()
        ->where('proftesis.tipo_resp', 1)->get();
        foreach($areas as $area){
            AreasProfesional::create([
                'id_profesional' => $area->cod_prof,
                'id_area' => $area->id_area
            ]);
        }
    }
}
