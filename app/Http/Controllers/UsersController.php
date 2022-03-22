<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:Usuarios_inicio'])->only('index');
   
    }
    public function index()
    {
        return view('users');
    }
}
