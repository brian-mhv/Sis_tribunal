<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profesional;
use App\ProfTesis;

class Tribunal extends Model
{
    protected $table='tribunal';
    public $timestamps=false;

    public function getAll(){
        $tribunal = \DB::table('tribunal')
        ->join('tesis', 'tesis.codigo', 'tribunal.id_tesis')
        ->select('tribunal.*', 'tesis.*')->get();
        return $tribunal;
    }
    
    public function getProf(){
        $profesional = new Profesional;
        return $profesional->all();
    }
    public function addCandidato($prof, $tesis){
        /*ProfTesis::create([
            'cod_prof' => $prof,
            'cod_tesis' => $tesis,
            'tipo_resp' => 2
            ]);*/
            $tribunal = \DB::table('tribunal')
            ->join('tesis', 'tesis.codigo', 'tribunal.id_tesis')
            ->select('tribunal.*', 'tesis.*')->get();
        print_r($tribunal);
    }
}
