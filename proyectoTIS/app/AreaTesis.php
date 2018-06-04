<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaTesis extends Model
{
    protected $table='areatesis';
    public $timestamps=false;

    public function getAreasTesis($idTesis){
        $areas = \DB::table('areatesis')->join('area', 'area.idArea', 'areatesis.id_area')
        ->select('area.*')->where('areatesis.id_tesis', $idTesis)->get();
        return $areas;
    }
}
