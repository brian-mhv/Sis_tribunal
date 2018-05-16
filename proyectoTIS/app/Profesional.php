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
        $invitados=\DB::table('profesional')->join('titulo', 'titulo.codigo', '=', 'profesional.titulo')->select('profesional.codigo', 'profesional.nombre', 
        'profesional.ape_pat', 'profesional.ape_mat', 'profesional.correo', 
        'titulo.nombre as titulo')->where('cod_docente', '=', null)->get();
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

}
