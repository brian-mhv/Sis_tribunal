<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthsController extends Controller
{
    //estan sujetos a cambios solo muestra la pagina 
    //depende de ustedes las funciones para poder resgistrar guardar enviar tec..
    public function __construct()
    {

    }
    public function index()
	{
		return view('login');
	}
}
