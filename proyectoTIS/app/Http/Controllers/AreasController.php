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
        return view('areas.index', compact('areas'), ['areas'=>$miArea->getAll()]);
    }
    public function add()
    {
        return view('areas.registrarArea', compact('areas'), ['var'=>0]);
    }
    public function addLote()
    {
        return view('areas.registrarAreaLote');
    }
    public function save(Request $request){
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
    return view('areas.index', compact('areas'), ['areas'=>$area->getAll()]);
    }
}
