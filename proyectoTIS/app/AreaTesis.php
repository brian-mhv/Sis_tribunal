<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

class AreaTesis extends Model
{
    protected $table='areatesis';
    public $timestamps=false;
    protected $fillable =[
        'id_area',
        'id_tesis'
    ];

    public function getAreasTesis($idTesis){
        $areas = \DB::table('areatesis')->join('area', 'area.idArea', 'areatesis.id_area')
        ->select('area.*')->where('areatesis.id_tesis', $idTesis)->get();
        return $areas;
    }
    public function importAreaTesis($file)
    {
    	Excel::load($file, function($reader) {
 
        foreach ($reader->get() as $proyecto) {
        AreaTesis::create([
            'id_area' => $proyecto->cod_are,
            'id_tesis' => $proyecto->cod_tes
            ]);
        }
        });
        return AreaTesis::all();
    }
}
