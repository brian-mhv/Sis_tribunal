<?php

namespace App;

use Illuminate\Http\Request;
use App\AreasProfesional;
use App\Profesional;
use App\Sesion;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

class Docente extends Model
{
    protected $table='docente';
    protected $table2='profesional';
    protected $primaryKey='codigo';
    public $timestamps=false;
    protected $fillable =[
        'telefono',
        'direccion'
    ];
    public function importDocentes($file1, $file2){
     $file = $file1;
     if(basename($file2) == "docentes.csv"){$file = $file2;}
     Excel::load($file, function($reader) {
      foreach ($reader->get() as $docente) {
         Docente::create([
            'telefono' => $docente->telefono,
            'direccion' => $docente->direccion
            ]);
         $prof = \DB:: table('profesional')->select('profesional.*')
         ->where('profesional.nombre', $docente->nombre)
         ->where('profesional.apellido_paterno', $docente->ape_pat)
         ->where('profesional.apellido_materno', $docente->ape_mat)->get();
         if(count($prof) == 0){
             $this->createProfesional($docente);
             $this->addSesion();
         }
         else{$this->compareProfesional($docente);}
      }
     });
    }
    public function compareProfesional($docente){
      $profesional = new Profesional;
      foreach ($profesional->invitados() as $prof ){
        if ($docente->nombre == $prof->nombre && $docente->ape_pat == $prof->apellido_paterno 
        && $docente->ape_mat == $prof->apellido_materno && is_null($prof->cod_docente)){
            $inv = Profesional::find($prof->codigo);
            $inv->correo = $docente->correo;
            $inv->cod_docente = $this->generateCode();
            $this->addNewSesion($inv->codigo, $docente->correo);
            $inv->save();
        }
      }
    }
    public function createProfesional($profesional){
        Profesional::create([
            'nombre' => $profesional->nombre,
            'apellido_paterno' => $profesional->ape_pat,
            'apellido_materno' => $profesional->ape_mat,
            'titulo' => $profesional->cod_tit,
            'correo' => $profesional->correo,
            'cod_docente' => $this->generateCode()
        ]);
    }
    public function generateCode(){
        $docente = \DB::table('docente')->select('codigo')->get();
        $id = $docente[count($docente) - 1];
        return $id->codigo;        
    }
    public function getAll(){
        $profesionales=\DB::table('profesional')->join('titulo', 'titulo.codigo', '=', 'profesional.titulo')
        ->join('docente', 'docente.codigo', '=', 'profesional.cod_docente')
        ->select('docente.*', 'profesional.*', 'titulo.nombre as titulo')->where('cod_docente', '>', 0)
        ->orderBy('profesional.codigo', 'asc')->get();
        return $profesionales;
    }
    public function addProfesional(Request $request){
        $codigo = \DB::table('docente')->select('codigo')->get();
        $id = $codigo[count($codigo) - 1];
        $profesional = new Profesional;
        $profesional->nombre = $request->input('nombre');
        $profesional->apellido_paterno = $request->input('apPat');
        $profesional->apellido_materno = $request->input('apMat');
        $profesional->correo = $request->input('correo');
        $profesional->titulo = $request->input('titulo');
        $profesional->cod_docente = $id->codigo;
        $profesional->save();
        $this->addAreas($request);
    }
    public function addAreas(Request $request){
        $codigo = \DB::table('profesional')->select('codigo')->get();
        $id = $codigo[count($codigo) - 1];
        foreach($request->input('area') as $area){
            $areasprof = new AreasProfesional;
            $areasprof->id_profesional = $id->codigo;
            $areasprof->id_area = $area;
            $areasprof->save();
        }
    }
    public function addSesion(){
        $codigo = \DB::table('profesional')->select('codigo', 'correo')->get();
        $id = $codigo[count($codigo) - 1];
        if($id->correo != NULL){
            $sesion = new Sesion;
            $sesion->usuario = $id->codigo;
            $sesion->correo = $id->correo;
            $sesion->pass = "hashtag";
            $sesion->nivel = 2;
            $sesion->save();
        }
    }

    public function addNewSesion($codigo, $correo){
        if($correo != NULL){
            $sesion = new Sesion;
            $sesion->usuario = $codigo;
            $sesion->correo = $correo;
            $sesion->nivel = 2;
            $sesion->save();
        }
    }
}
