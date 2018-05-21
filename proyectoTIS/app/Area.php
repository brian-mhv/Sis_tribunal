<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table='area';
    protected $primaryKey='idArea';
    public $timestamps=false;

    protected $fillable =[
        'nombre_area',
        'descripcion',
        'id_subarea'
    ];

    protected $guarded =[];

    public function getAll(){
        $areas=\DB::table('area')->select('*')->get();
        return $areas;
    }
    public function getId(){
        $codigo=\DB::table('area')->select('idArea')->get();
        $id = $codigo[count($codigo) - 1];
        return $id->idArea;
    }
}
