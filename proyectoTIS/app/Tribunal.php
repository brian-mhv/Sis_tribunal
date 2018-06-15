<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profesional;
use App\Proyecto;
use App\ProfTesis;

class Tribunal extends Model
{
    protected $table='tribunal';
    protected $primaryKey='idTribunal';
    public $timestamps=false;
    protected $fillable =[
        'idTribunal',
        'id_profesional1',
        'id_profesional2',
        'id_profesional3',
        'id_tesis',
        'fecha_defensa'
    ];

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
    public function addRelation($request){
        $proftesis = new ProfTesis;
        $proftesis->addTribunal($request);
        $tribunal = Proyecto::find($request->input('tesis'));
        $tribunal->estado = 2;
        $tribunal->save();
    }
    public function getTribunal($idTesis){
        $t = new Tribunal;
        $tribunales = $t->all();
        foreach($tribunales as $tribunal){
            if ($tribunal->id_tesis == $idTesis){
                return $tribunal;
            }
        }
    }
}
