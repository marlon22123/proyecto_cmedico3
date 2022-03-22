<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssingsController extends Controller
{
       public function __construct()
    {
        $this->middleware('can:Asignar_inicio')->only('index');


    }  
  
    public function index()
    {
        return view('assigns');
    }
}
