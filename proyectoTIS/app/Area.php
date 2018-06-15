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
    public function getByFilter($string, $tesis){
        $proftesis = \DB::table('proftesis')
            ->select('proftesis.*')->distinct()
            ->where('proftesis.cod_tesis', $tesis)
            ->where('proftesis.tipo_resp', 1)->get();
        $area = $this->getFilter($string);
        if($area !== NULL){
            $profesionales = \DB::table('areasprofesional')
            ->join('profesional', 'profesional.codigo', 'areasprofesional.id_profesional')
            ->select('profesional.*', 'areasprofesional.*')->distinct()
            ->where('areasprofesional.id_area', $area->idArea)
            ->where('profesional.codigo', '<>', $proftesis[0]->cod_prof)
            ->orderBy('profesional.codigo', 'asc')->get();
            return $this->cantProyectos($profesionales);
        }
        return NULL;
    }

    public function getSustituto($tesis, $tribunal){
        $proftesis = \DB::table('proftesis')
            ->select('proftesis.*')->distinct()
            ->where('proftesis.cod_tesis', $tesis)
            ->where('proftesis.tipo_resp', 1)->get();
            $profesionales = \DB::table('areatesis')
            ->join('tesis', 'tesis.codigo', 'areatesis.id_tesis')
            ->join('areasprofesional', 'areasprofesional.id_area', 'areatesis.id_area')
            ->join('profesional', 'profesional.codigo', 'areasprofesional.id_profesional')
            ->select('profesional.*')->distinct()
            ->where('profesional.codigo', '<>', $proftesis[0]->cod_prof)
            ->where('profesional.codigo', '<>', $tribunal->id_profesional1)
            ->where('profesional.codigo', '<>', $tribunal->id_profesional2)
            ->where('profesional.codigo', '<>', $tribunal->id_profesional3)
            ->orderBy('profesional.codigo', 'asc')->get();
            return $this->cantProyectos($profesionales);
    }

    public function cantProyectos($profesionales){
        foreach($profesionales as $prof){
            $proftesis = \DB::table('proftesis')
            ->select('*')->distinct()
            ->where('proftesis.tipo_resp', 2)
            ->where('proftesis.cod_prof', $prof->codigo)->get();
            $prof->id_profesional = count($proftesis);
            }
        return $profesionales;
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
