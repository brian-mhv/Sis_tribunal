<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table='area';
    protected $primaryKey='idArea';
    public $timestamps=false;

    protected $fillable =[
        'idArea',
        'nombre_area',
        'descripcion',
        'id_subarea'
    ];

    protected $guarded =[];

    public function getAll(){
        $areas=\DB::table('area')->select('idArea', 'nombre_area', 'descripcion', 'id_subarea')->get();
        return $areas;
    }

    public function up()
    {
        Schema::create('area', function (Blueprint $table) {
            $table->increments('idArea');
            $table->string('nombre_area');
            $table->string('descripcion');
            $table->string('id_subarea');
            $table->timestamps();
        });
    }
    public function getId(){
        $codigo=\DB::table('area')->select('idArea')->get();
        $id = $codigo[count($codigo) - 1];
        return $id->idArea;
    }
}
