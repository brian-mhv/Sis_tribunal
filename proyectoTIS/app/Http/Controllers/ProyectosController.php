<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function __construct()
    {

    }
    public function index(){
        return view('proyecto.registrarProy');
    }
    public function index2(){
        return view('proyecto.registrarProyLote');
    }
}
