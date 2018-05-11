<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $table='profesional';
    protected $primaryKey='idProfesional';
    public $timestamps=false;

    protected $fillable =[];

    protected $guarded =[];

    public function getAll(){
        $profesionales=\DB::table('profesional')->select('codigo', 'nombre', 'apellido_paterno', 'apellido_materno', 'correo')->get();
        return $profesionales;
    }
    public function invitados(){
        $invitados=\DB::table('profesional')->join('titulo', 'titulo.codigo', '=', 'profesional.titulo')->select('profesional.codigo', 'profesional.nombre', 
        'profesional.apellido_paterno', 'profesional.apellido_materno', 'profesional.correo', 
        'titulo.nombre as titulo')->where('cod_docente', '=', null)->get();
        return $invitados;
    }
}
