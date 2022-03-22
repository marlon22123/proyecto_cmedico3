<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:Servicios_inicio']);
   
    }
  
    public function index()
    {
        return view('services');
    }
}
