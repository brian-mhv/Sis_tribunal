<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function __construct()
    {

    }
    public function add(){
        return view('proyecto.registrarProy');
    }
    public function addLote(){
        return view('proyecto.registrarProyLote');
    }
}
