<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $table='profesional';
    protected $primaryKey='idProfesional';
    public $timestamps=false;

    protected $fillable =[
        'codigo',
        'nombre',
        'ape_pat',
        'ape_mat',
        'titulo',
        'correo',
        'cod_docente'
    ];

    protected $guarded =[];

    public function getAll(){
        $profesionales=\DB::table('profesional')->select('codigo', 'nombre', 'ape_pat', 'ape_mat', 'correo')->get();
        return $profesionales;
    }
    public function invitados(){
        $invitados=\DB::table('profesional')->join('titulo', 'titulo.codigo', 'profesional.titulo')
        ->select('profesional.*', 'titulo.nombre as titulo')->where('cod_docente', '=', null)->get();
        return $invitados;
    }

    public function up()
    {
        Schema::create('profesional', function (Blueprint $table) {
            $table->increments('codigo');
            $table->string('nombre');
            $table->string('ape_pat');
            $table->string('ape_mat');
            $table->integer('titulo');
            $table->string('correo');
            $table->integer('cod_docente');
            $table->timestamps();
        });
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
}