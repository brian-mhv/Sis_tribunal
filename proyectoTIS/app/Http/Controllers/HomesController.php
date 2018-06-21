<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Sesion;
use App\Http\Requests;

class HomesController extends Controller
{
    public function index(Request $request){
		return view('home',compact('layouts'), ['user'=>$this->getUser()]);
    }
    public function index2()
    {
        return view('home',compact('layouts'), ['user'=>$this->getUser()]);
    }
    public function getSesion(Request $request){
        $this->validate($request, [
            'correo' => 'required|string',
            'pass' => 'required|string'
            ]);
        $sesion = new Sesion;
        $res = $sesion->searchUser($request);
        $this->addSesion($res);
        $user = $this->getUser(); 
        return view('home', ['user'=>$user]);
    }
    public function logout(){
        $this->closeSesion();
        return view('home', ['user'=>$this->getUser()]);
    }
}
