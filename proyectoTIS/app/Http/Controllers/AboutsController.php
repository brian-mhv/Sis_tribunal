<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AboutsController extends Controller
{
    public function __construct()
    {

    }
    public function index(){
        return view('about', ['user'=>$this->getUser()]);
    }
}
