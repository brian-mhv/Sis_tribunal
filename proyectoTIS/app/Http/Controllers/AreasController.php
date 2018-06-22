<?php

namespace App\Http\Controllers;


use App\Area;
use Illuminate\Http\Request;
use App\Http\Requests;

class AreasController extends Controller
{
    public function index()
    {   
        $miArea = new Area;
        return view('areas.index', compact('areas'), ['areas'=>$miArea->getAll(), 'user'=>$this->getUser()]);
    }
    public function add(){
        if($this->getUser() && $this->getUser()[0]->nivel <= 3){
            return view('areas.registrarArea', compact('areas'), ['var'=>0, 'user'=>$this->getUser()]);
        }
        return view('help', ['user'=>$this->getUser()]);
    }
    public function addLote(){
        if($this->getUser() && $this->getUser()[0]->nivel <= 2){
            return view('areas.registrarAreaLote', ['user'=>$this->getUser()]);
        }
        return view('help', ['user'=>$this->getUser()]);
    }
    public function save(Request $request){
        if(count($request->file()) > 0){
          if($this->getUser() && $this->getUser()[0]->nivel <= 2){
            $area = new Area;
            $file = $request->file('file');
            $area->importAreas($file);
            return view('areas.index', compact('areas'), ['areas'=>$area->getAll(), 'user'=>$this->getUser()]);
          }
          return view('help', ['user'=>$this->getUser()]);
        }

        $this->validate($request, [
            'nombre' => 'required|string'
        ]);
        //echo($request->input('nombre'));
        //echo($request->input('descripcion'));
        $area = new Area;
        $area->nombre_area = $request->input('nombre');
        if($request->input('descripcion') != ""){
            $area->descripcion = $request->input('descripcion');
        }
        $area->save();
        $id = $area->getId();
        for($i=1; $i<=$request->input('elementos'); $i ++){
            $subarea = new Area;
            $subarea->nombre_area = $request->input($i);
            $subarea->id_subarea = $id; 
            $subarea->save();
        }
        return view('areas.index', compact('areas'), ['areas'=>$area->getAll(), 'user'=>$this->getUser()]);
    }
}
