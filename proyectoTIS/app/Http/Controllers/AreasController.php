<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use App\Http\Requests;

class AreasController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {    
        $miArea = new Area;
        return view('areas.index', compact('areas'), ['areas'=>$miArea->getAll()]);
    }
    public function add()
    {
        return view('areas.registrarArea');
    }
    public function addLote()
    {
        return view('areas.registrarAreaLote');
    }
    public function save(Request $request){
        $this->validate($request, [
            'nombre' => 'required|string'
        ]);
        echo($request->input('nombre'));
        echo($request->input('descripcion'));
        print_r($request->input());
        $area = new Area;
        $area->nombre_area = $request->input('nombre');
        if($request->input('descripcion') != ""){
            $area->descripcion = $request->input('descripcion');
        }
        //$area->descripcion = $request->input('descripcion');
        $area->save();
    return view('areas.index', compact('areas'), ['areas'=>$area->getAll()]);
    }

}
