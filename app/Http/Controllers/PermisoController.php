<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermisoController extends Controller
{
       public function __construct()
    {
        $this->middleware('can:Permisos_inicio')->only('index');


   
    } 
 public function index()
 {
     return view('permisos');
 }
}
