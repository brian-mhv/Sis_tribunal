<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

class EstTesis extends Model
{
    protected $table='esttesis';
    public $timestamps=false;
    protected $fillable =[
        'cod_alumno',
        'cod_tes'
    ];

    public function importEstTesis($file)
    {
    	Excel::load($file, function($reader) {
 
        foreach ($reader->get() as $esttesis) {
        EstTesis::create([
            'cod_alumno' => $esttesis->cod_est,
            'cod_tes' => $esttesis->cod_tes
            ]);
        }
        });
    }
}
