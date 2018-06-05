<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

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
        $areas=\DB::table('area')->select('*')->get();
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

    public function getFilter($string){
        $areas = $this->getAll();
        foreach($areas as $area){
            if(strlen(stristr($area->nombre_area,$string))>0){
                return $area;
            }
        }
        return NULL;
    }
    public function getByFilter($string){
        $area = $this->getFilter($string);
        if($area !== NULL){
            $profesionales = \DB::table('areasprofesional')
            ->join('profesional', 'profesional.codigo', 'areasprofesional.id_profesional')
            ->select('profesional.*')->distinct()->where('areasprofesional.id_area', $area->idArea)->get();
            return $profesionales;
        }
        return NULL;
    }

    public function importAreas($file)
    {
    	Excel::load($file, function($reader) {
 
            foreach ($reader->get() as $area) {
                Area::create([
                    'idArea' =>$area->codigo,
                    'nombre_area' => $area->nombre,
                    'descripcion' =>$area->descripcion,
                    'id_subarea' =>$area->cod_are
                ]);
            }
        });
    }
}
