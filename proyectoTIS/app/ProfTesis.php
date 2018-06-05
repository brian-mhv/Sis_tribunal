<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;


class ProfTesis extends Model
{
    protected $table='proftesis';
    public $timestamps=false;
    protected $fillable =[
        'cod_prof',
        'cod_tesis',
        'tipo_resp'
    ];

    public function importProfTesis($file)
    {
    	Excel::load($file, function($reader) {
 
        foreach ($reader->get() as $proftesis) {
        ProfTesis::create([
            'cod_prof' => $proftesis->cod_res,
            'cod_tesis' => $proftesis->cod_tes,
            'tipo_resp' => $proftesis->cod_tip_res
            ]);
        }
        });
    }
}
