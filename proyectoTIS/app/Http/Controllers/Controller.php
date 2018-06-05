<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct(){
        \Session::put('user', null);
    }

    public function getUser(){
        $myUser = \Session::get('user');
        return $myUser;
    }

    public function addSesion($newUser){
        \Session::put('user', $newUser);
    }

    public function closeSesion(){
        \Session::put('user', null);
    }

    public function createSesion(){
        $profesionales = new Profesionales;
        $prof = $profesionales->all();
    }
}
