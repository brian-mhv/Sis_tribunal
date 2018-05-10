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
        $profesionales=\DB::table('profesional')->select('codigo', 'nombre', 'apellido_paterno', 
        'apellido_materno', 'titulo', 'cod_docente')->get();
        return $profesionales;
    }
    public function invitados(){
        $invitados=\DB::table('profesional')->select('codigo', 'nombre', 'apellido_paterno', 
        'apellido_materno', 'titulo', 'cod_docente')->where('codigo', '=', 0)->get();
        return $invitados;
    }
}
