<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesController extends Controller
{
       public function __construct()
    {
        $this->middleware('can:Roles_inicio')->only('index');


   
    } 
    public function index()
    {
        return view('roles');
    }
}
