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
        $areas=\DB::table('area')->select('idArea', 'nombre_area', 'descripcion', 'id_subarea')->get();
        return $areas;
    }
}
