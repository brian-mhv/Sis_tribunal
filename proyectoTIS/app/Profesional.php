<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $table='profesional';
    protected $primaryKey='idProfesional';
    public $timestamps=false;

    protected $fillable =[
        'nombreArea',
        'descripcion',
        'idSubarea'
    ];

    protected $guarded =[];

    public function all(){
        $profesionales=\DB::table($table)->select('id', 'nombre', 'apellido_pat', 
        'apellidoMat', 'titulo', 'idDocente')->get();
        return $profesionales;
    }
    public function invitados(){
        $invitados=\DB::table($table)->select('id', 'nombre', 'apellido_pat', 
        'apellido_mat', 'titulo', 'id_docente')->where('id_docente', '=', 0)->get();
        return $profesionales;
    }
    public function docentes(){
        $invitados=\DB::table($table)->select('id', 'nombre', 'apellido_pat', 
        'apellido_mat', 'titulo', 'id_docente')->where('id_docente', '>', 0)->get();
        return $profesionales;
    }
}
